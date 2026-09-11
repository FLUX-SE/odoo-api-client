# Architecture JSON-2 additive

## Statut et référence

Ce document fige les décisions du lot A à partir de la révision
`2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2`. Il complète
`json2-migration-analysis.md` et constitue le contrat de travail des lots B à G.

JSON-2 est un chemin opt-in pour Odoo 19. La pile RPC, son builder, ses
interfaces et son protocole par défaut restent inchangés. Les services `common`
et `db` ne sont pas émulés par JSON-2.

Les corrections K1 à K3 sont vérifiées avec des doubles et la suite serveur
passe désormais sur une instance Docker Odoo 19 jetable, avec génération de
modèles et révocation vérifiée des clés éphémères. K4 dispose du provisionneur
et d'une étape dans le job existant de `build.yml`, uniquement pour Odoo 19,
sans seconde instance ni nouvelle matrice ; sa première exécution GitHub reste à
confirmer. Cette validation ciblée ne certifie pas la production.

## Propriété des fichiers

- Lot B : `src/Api/Json2/**`, `src/Serializer/Json2/**`,
  `src/HttpClient/Json2/**` et leurs tests miroirs.
- Lot C : `src/Operations/Json2/Mapping/**` et leurs tests.
- Lot D : `src/Operations/Json2/**` hors `Mapping`, `src/Builder/Json2/**` et
  leurs tests.
- Les fichiers historiques ne changent que lors de l'intégration, après une
  revue explicite de compatibilité.

## Contrat natif

Le namespace natif expose les contrats suivants :

```php
namespace FluxSE\OdooApiClient\Api\Json2;

interface Json2ClientInterface
{
    /** @param array<string, mixed> $parameters */
    public function call(string $model, string $method, array $parameters = []): ResponseInterface;

    public function decode(ResponseInterface $response): mixed;

    public function getLastResponse(): ?ResponseInterface;
}
```

`Json2Connection` est une valeur immuable contenant une origine HTTP(S), un
préfixe de reverse proxy éventuel, une base optionnelle et une clé API. La clé
n'est jamais exposée par `__toString()`, les messages d'erreur ou les logs.
Changer hôte, base ou clé signifie construire une nouvelle connexion et un
nouveau client.

`Json2Client` utilise PSR-18 et PSR-17. Il envoie exclusivement des requêtes
`POST <prefix>/json/2/<model>/<method>` avec :

- `Authorization: Bearer <clé>` ;
- `Content-Type: application/json; charset=utf-8` ;
- `X-Odoo-Database` seulement lorsque la base est configurée ;
- un `User-Agent` non sensible.

`model` et `method` sont des segments validés. Ils ne peuvent contenir ni `/`,
ni `..`, ni séparateur, schéma ou origine. Le préfixe configuré est conservé.
Le client PSR-18 injecté doit avoir les redirections inter-origines désactivées :
PSR-18 ne permet pas à `Json2Client` d'imposer cette politique une fois la
requête autorisée remise à l'adaptateur.

Le codec JSON-2 encode un dictionnaire racine. Un dictionnaire ou `context`
vide devient `{}` ; listes, domaines, identifiants et commandes relationnelles
restent des listes. `Json2Dictionary` marque les dictionnaires de valeurs vides
que PHP représenterait autrement comme `[]`, notamment pour `create` et
`write`. Le décodage accepte toutes les racines JSON : objet,
tableau, entier, flottant, chaîne, booléen et `null`. Il ne traite jamais les
clés métier `result` ou `error` comme une enveloppe RPC.

Le flux de la réponse native reste lisible après décodage. Un flux non seekable
est copié dans un nouveau flux et la réponse conservée est celle portant ce
flux relisible.

## Erreurs natives

Les erreurs JSON-2 ont leur propre hiérarchie :

- `Json2TransportException` pour une erreur PSR-18 ;
- `Json2DecodingException` pour une réponse vide ou JSON invalide inattendu ;
- `Json2HttpException` pour un statut non 2xx, avec statut, nom d'erreur si
  présent et accès contrôlé à la réponse originale.

Les messages publics ne contiennent jamais clé, headers, paramètres, contexte,
arguments serveur, traceback ou corps complet. Les détails structurés peuvent
être conservés séparément sans être interpolés. Aucun retry ou fallback RPC
n'est automatique, notamment pour les écritures et actions.

## Registre et traduction

Le lot C fournit des transformations pures :

```php
namespace FluxSE\OdooApiClient\Operations\Json2\Mapping;

interface MethodSignatureRegistryInterface
{
    public function resolve(string $model, string $method): MethodSignature;
}

interface CallMapperInterface
{
    /** @param mixed[] $arguments @param mixed[] $options */
    public function map(
        string $model,
        string $method,
        array $arguments = [],
        array $options = [],
    ): MappedCall;
}
```

`MethodSignature` fige : portée modèle ou recordset, noms et positions,
paramètres permis, règle de retour et provenance Odoo. La résolution donne la
priorité à `(modèle, méthode)` exact, puis aux signatures ORM génériques.
L'extension se fait en ajoutant une signature, sans modifier un contrat RPC.

Le registre couvre `search`, `search_count`, `search_read`, `read`, `create`,
`write`, `unlink`, `fields_get`, `default_get`, `check_access_rights`,
`account.move/action_post` et
`account.payment.register/action_create_payments`.

Les signatures ORM intégrées sont rattachées à
`odoo/odoo@cd992ceebbaf343c03e1941d39cfe423d35ba6c6` : `search` accepte les
positionnels `domain`, `offset`, `limit`, `order` ; `search_count`, `domain` et
`limit` ; `search_read`, `domain`, `fields`, `offset`, `limit`, `order`.
`search_read` accepte explicitement `load`, y compris `load=null`, sans ouvrir
indistinctement tous les mots-clés de lecture. Les collisions, positionnels en
excès et options inconnues restent refusés avant HTTP.

Le mapper distingue argument omis, `[]`, `[[]]` et `null`. Il rejette avant
HTTP les collisions positionnel/mot-clé, les ambiguïtés `ids`/`context` et les
signatures positionnelles inconnues. Il ne déduit jamais une signature du nom
`action_*`.

`create` unitaire devient `vals_list: [<vals>]`. La réponse native reste une
liste d'identifiants ; seule la façade unitaire peut exiger exactement un
élément et le retourner comme `int`. Une création multiple, même d'un seul
élément, conserve sa liste.

Les IDs scalaires ne deviennent une liste que pour une signature recordset
enregistrée. Les options non acceptées par `search_count` ne sont pas supprimées
silencieusement : les valeurs neutres connues peuvent être reconnues par la
signature, toute valeur métier incompatible est refusée.

`fields_get` est traité par une entrée dédiée de l'adaptateur d'inspection. La
liste plate produite par le wrapper historique ne sert pas d'heuristique pour
réinterpréter un appel bas niveau arbitraire.

## Façade de compatibilité

`Json2ObjectOperations` est une nouvelle implémentation, par composition, de
`ObjectOperationsInterface`. Elle ne dérive pas de `ObjectOperations`, qui est
finale. Elle réutilise `RecordOperations`, `RecordListOperations` et l'adaptateur
dédié `Json2InspectionOperations`. Les classes tierces recevant un
`ObjectOperationsInterface` restent instanciables.

`execute_kw()` traduit les signatures connues. Une méthode inconnue n'est
admise que sans argument positionnel et avec des options nommées ; sinon elle
est refusée avant HTTP. La réponse JSON-2 native est convertie en réponse
synthétique de compatibilité, par exemple :

```json
{"jsonrpc":"2.0","id":"json2-compat","result":{"uid":7}}
```

L'identifiant stable `json2-compat` sert uniquement de corrélation locale et
n'est jamais envoyé. Le statut HTTP natif est conservé. Le corps est recréé
dans un flux relisible ; `Content-Length`, `Content-Encoding`, `ETag` et les
métadonnées invalidées par le nouveau corps sont retirés ou recalculés. Une
erreur HTTP n'est jamais transformée en succès synthétique.

Le helper RPC historique ne voit que cette enveloppe synthétique ; il ne décode
jamais la réponse JSON-2 native. `getLastResponse()` sur la façade désigne la
réponse synthétique effectivement remise au consommateur. Le contrat natif
permet séparément d'obtenir la dernière réponse native.

Les racines `null` et `float` restent accessibles nativement. Si elles doivent
traverser une méthode dont l'union historique ne les accepte pas, la façade
lève `Json2CompatibilityException` sans conversion arbitraire.

`request()` sur la façade n'accepte pas une enveloppe RPC libre. Sa grammaire
est limitée aux appels documentés par l'adaptateur ; toute autre forme lève
`Json2UnsupportedCallException` avant HTTP. `getEndpointPath()` retourne le
chemin logique `/object` et `getService()` retourne `object`, conformément au
contrat historique, mais ni l'un ni l'autre ne définit l'URL réseau JSON-2.
Le request maker de compatibilité ne doit jamais envoyer une enveloppe RPC au
serveur JSON-2.

## Identité, setters et isolation

Dans la façade, les noms historiques `username` et `password` sont conservés
uniquement pour satisfaire `ObjectOperationsInterface` :

- `password` est explicitement la clé API dans ce mode ;
- `username` est seulement un libellé facultatif de compatibilité, stocké
  localement, non vérifié et jamais envoyé à Odoo. Il ne sélectionne aucun
  utilisateur et ne prouve aucune identité.

`retrieveUid()` appelle `res.users/context_get` seulement lorsqu'il est demandé,
lit un UID entier réel et le met en cache. Aucun appel d'authentification RPC ne
précède les appels métier. Un changement de libellé invalide le cache UID et la
dernière réponse locale, mais ne change jamais l'utilisateur porté par la clé.

Dans le nouveau chemin, changer hôte, base ou clé invalide transport, dernière
réponse et UID. Deux builders ou clients ne partagent aucun cache mutable.
L'absence d'invalidation du builder/UID historiques est caractérisée comme une
anomalie préexistante, pas reproduite.

Chaque reconstruction du graphe d'opérations incrémente une génération interne.
Seule la façade appartenant à la génération courante peut synchroniser hôte,
base, clé et libellé vers le builder. Une façade détachée continue de gérer son
propre état, mais ses setters ne peuvent plus modifier la façade courante, le
client natif reconstruit ni les constructions futures. Les resets dus au client
HTTP, factories, serializer, codec ou registre créent donc une nouvelle
frontière d'appartenance et ne ressuscitent ni UID ni dernière réponse obsolète.
La factory de client d'une façade capture également ses dépendances PSR et son
codec à la construction : reconfigurer une façade détachée ne lui attribue pas
le nouveau transport du builder.

`Json2ApiClientBuilder` est distinct de `OdooApiClientBuilder`. Il reçoit une
connexion JSON-2 explicite et permet l'injection du client PSR-18, des factories
PSR-17, du serializer métier et du registre. Il ne promet ni `common`, ni `db`.
L'ancien builder conserve JSON-RPC par défaut et XML-RPC explicite.

## Gardes d'intégration des écritures

Le harnais d'intégration enveloppe tout client HTTP construit par
`Json2IntegrationEnvironment`. Sans le second opt-in d'écriture et les gardes
locales de base jetable/run, toute méthode mutante est refusée avant réseau.
Avant la première écriture ou action autorisée, l'enveloppe effectue elle-même
une lecture authentifiée de `ir.module.module/search_read` et exige une version
installée de `base` commençant par `19.`. Ce contrôle ne dépend ni de l'ordre des
tests ni d'un test PHPUnit sélectionné séparément. Une mauvaise version, une
réponse invalide ou un refus HTTP empêche la requête métier.

Les méthodes de lecture sont explicitement listées ; toute méthode inconnue est
considérée mutante par prudence. Une fois une requête métier remise au client
PSR-18, une perte de réponse reste un résultat incertain et n'entraîne aucun
rejeu. Les fixtures comptables doivent porter une référence exacte liée au run,
ainsi que les IDs de société et de journaux attendus. Les tests vérifient l'état
avant et après `action_post`, puis le résultat, l'état de facture et les
paiements liés après `action_create_payments`.

## Preuves et limites du lot A

La fixture `tests/Compatibility/Json2Migration/fixtures/public-api-reference.php`
fige les 34 interfaces et les empreintes des symboles publics/protégés. Les tests
de caractérisation sans réseau figent le builder, ses injections et caches, les
prédicats de protocole défectueux, `getLastResponse()`, le cache UID, les formes
`[]`/`[[]]`, `fields_get`, `search_count` et l'extension tierce.

Ces anomalies ne deviennent pas des promesses JSON-2. Les preuves réseau,
le provisionnement jetable et la génération CLI réelle ont été exécutés
localement via `.github/json2/run.py`. Le [rapport de revue](json2-review.md)
distingue ces résultats de la matrice GitHub encore à exécuter.
