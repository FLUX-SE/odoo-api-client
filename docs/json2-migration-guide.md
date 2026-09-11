# Migrer progressivement vers JSON-2 avec Odoo 19

Pour une migration côté application, commencer par [UPGRADE.md](../UPGRADE.md)
à la racine : configuration, exemples avant/après et checklist de compatibilité.

## Statut et périmètre

JSON-2 est un chemin opt-in distinct destiné à Odoo 19. Le builder historique
reste en JSON-RPC par défaut et conserve son mode XML-RPC explicite. Il n'y a
ni détection automatique du protocole, ni repli silencieux vers RPC.

Les tests sans réseau valident le transport, la traduction des appels, la
façade et les gardes d'écriture. La suite réelle Odoo 19 passe également dans
Docker, avec des modèles générés, les managers, les droits et les actions
comptables. Le provisionnement et l'étape JSON-2 dans le job existant sont livrés ; la première
exécution GitHub reste à confirmer. Ce résultat ciblé n'est pas une validation
générale de production. Avant une mise en production, exécuter les contrôles de la
[checklist finale](#checklist-de-revue-finale) sur une base jetable explicitement
autorisée.

JSON-2 ne remplace pas universellement l'API externe historique : les services
`common` et `db`, les appels positionnels arbitraires et les méthodes dont la
signature n'est pas connue ne sont pas automatiquement transposables.

## Choisir entre client natif et façade compatible

Deux niveaux d'API sont disponibles :

| Besoin | API à utiliser | Résultat |
| --- | --- | --- |
| Appel JSON-2 avec paramètres nommés, y compris une méthode personnalisée | `Json2ClientInterface` | Valeur JSON native : tableau, objet associatif, entier, flottant, chaîne, booléen ou `null` |
| Réutilisation de `RecordOperations`, `RecordListOperations`, managers ou opérations tierces | `Json2ObjectOperations` via `Json2ApiClientBuilder` | Réponse JSON-RPC synthétique locale compatible avec les helpers historiques |
| Inspection `fields_get` avec une liste de champs | `Json2InspectionOperations` via `buildInspectionOperations()` | Tableau d'informations de champs |

Le client natif envoie un `POST` vers
`<origine>/<préfixe>/json/2/<modèle>/<méthode>`. La façade traduit les appels
historiques couverts en paramètres nommés, appelle ce client, puis produit
localement une enveloppe dont l'identifiant est `json2-compat`. Cette enveloppe
n'est jamais envoyée à Odoo. Son statut HTTP reste celui de la réponse native
et les métadonnées devenues invalides après remplacement du corps sont retirées
ou recalculées.

`Json2ClientInterface::getLastResponse()` expose la dernière réponse native du
client concerné. `Json2ObjectOperations::getLastResponse()` et le request maker
de compatibilité exposent la dernière réponse synthétique remise au code
historique.

### Exemple natif

La clé doit provenir d'un gestionnaire de secrets ou de l'environnement du
processus. Ne placer aucune clé dans le dépôt, une URL, un argument de commande
ou cet exemple.

```php
<?php

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;

$host = 'https://example.odoo.com';
$database = 'odoo-production';
$apiKey = getenv('ODOO_JSON2_API_KEY');

if (!is_string($apiKey) || '' === $apiKey) {
    throw new RuntimeException('ODOO_JSON2_API_KEY is required.');
}

$connection = new Json2Connection($host, $apiKey, $database);
$builder = new Json2ApiClientBuilder($connection, '', $apiKey);
$client = $builder->buildJson2Client();

$response = $client->call('res.partner', 'search_read', [
    'domain' => [['is_company', '=', true]],
    'fields' => ['id', 'name'],
    'limit' => 1,
    'context' => [
        'allowed_company_ids' => [2],
        'lang' => 'fr_FR',
    ],
]);

$partners = $client->decode($response);
```

Le client natif accepte les méthodes personnalisées tant que le modèle et la
méthode sont des segments sûrs et que tous les paramètres sont nommés. Il ne
déduit aucune signature et n'ajoute ni login, ni UID, ni mot de passe au corps.

### Exemple avec les wrappers et managers existants

```php
<?php

use FluxSE\OdooApiClient\Api\Json2\Json2Connection;
use FluxSE\OdooApiClient\Builder\Json2\Json2ApiClientBuilder;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\Criterion;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Arguments\SearchDomains;
use FluxSE\OdooApiClient\Operations\Object\ExecuteKw\Options\SearchReadOptions;

$host = 'https://example.odoo.com';
$database = 'odoo-production';
$compatibilityLabel = 'integration@example.test';
$apiKey = getenv('ODOO_JSON2_API_KEY');

if (!is_string($apiKey) || '' === $apiKey) {
    throw new RuntimeException('ODOO_JSON2_API_KEY is required.');
}

$connection = new Json2Connection($host, $apiKey, $database);
$builder = new Json2ApiClientBuilder($connection, $compatibilityLabel, $apiKey);
$recordListOperations = $builder->buildRecordListOperations();

$domain = new SearchDomains();
$domain->addCriterion(Criterion::equal('is_company', true));

$options = new SearchReadOptions();
$options->addField('name');
$options->setLimit(1);
$options->addOption('context', [
    'allowed_company_ids' => [2],
    'lang' => 'fr_FR',
]);

$partners = $recordListOperations->search_read('res.partner', $domain, $options);

// Pour une classe générée App\Odoo\Model\Object\Res\Partner :
$modelListManager = $builder->buildModelListManager();
$partner = $modelListManager->findOneBy(
    App\Odoo\Model\Object\Res\Partner::class,
    $domain,
    $options,
);
```

Le constructeur actuel du builder reçoit la même clé dans `Json2Connection`
et dans son troisième argument. Cette duplication permet à la façade de
satisfaire les accesseurs historiques `getPassword()`/`setPassword()` sans
exposer de getter de clé sur la connexion immutable. Toujours réutiliser la
même variable secrète ; la valeur explicite du builder est celle appliquée à
la connexion.

Le login est un libellé facultatif de compatibilité, stocké mais non vérifié. Il
ne sélectionne pas un utilisateur et n'est pas envoyé à Odoo. L'identité
effective est celle de la clé. `retrieveUid()` appelle
`res.users/context_get` uniquement lorsqu'il est explicitement demandé, lit
son champ `uid`, puis le met en cache.

### Injection PSR et registre personnalisé

Les dépendances doivent être injectées avant la première construction d'un
client, d'une façade ou d'un wrapper :

```php
$builder->setHttpClient($psr18Client);
$builder->setRequestFactory($requestFactory);
$builder->setResponseFactory($responseFactory);
$builder->setStreamFactory($streamFactory);
$builder->setUriFactory($uriFactory);
```

Le serializer métier, le codec, le registre, le request body factory et le
helper RPC de compatibilité sont également remplaçables par leurs setters
dédiés. Un changement d'injection invalide le graphe d'objets construit par le
builder et ouvre une nouvelle génération. Seule la façade de la génération
courante peut synchroniser ses changements d'hôte, de base, de clé ou de
libellé vers le builder. Une ancienne façade conserve son propre état mais ne
peut plus contaminer la façade active, le client natif ni les constructions
futures. Les UID et dernières réponses ne traversent pas une reconstruction.
La façade détachée conserve également son transport d'origine lors d'une
reconfiguration ; elle ne récupère pas les nouvelles dépendances du builder.

Pour un appel positionnel personnalisé à travers un wrapper historique,
enregistrer une signature avant de construire les opérations :

```php
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodScope;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignature;
use FluxSE\OdooApiClient\Operations\Json2\Mapping\MethodSignatureRegistry;

$registry = new MethodSignatureRegistry([
    new MethodSignature(
        'x.example',
        'calculate_total',
        MethodScope::MODEL,
        ['lines'],
        ['lines', 'context'],
        ['lines'],
    ),
]);

$builder->setRegistry($registry);
```

Une signature inconnue avec des arguments positionnels est refusée avant tout
appel HTTP. Pour une méthode personnalisée naturellement nommée, préférer le
client natif.

## Matrice des capacités

| Capacité | Client natif | Façade et wrappers | Limite |
| --- | --- | --- | --- |
| `search`, `search_count`, `search_read`, `read` | Oui, paramètres nommés | Oui | Positionnels connus : `search(domain, offset, limit, order)`, `search_count(domain, limit)`, `search_read(domain, fields, offset, limit, order)` ; `search_read` préserve explicitement `load`, même `null` |
| `create`, `write`, `unlink` | Oui | Oui | Le wrapper `create` unitaire transforme exactement une liste d'un ID en `int` |
| `fields_get` | Oui | Oui, avec `buildInspectionOperations()` | Utiliser le wrapper JSON-2 dédié pour une liste plate de champs |
| `default_get`, `check_access_rights` | Oui | Oui, signatures enregistrées | `default_get` utilise le paramètre Odoo 19 `fields` |
| `account.move/action_post` | Oui | Oui | ID scalaire normalisé en recordset seulement pour cette signature enregistrée |
| `account.payment.register/action_create_payments` | Oui | Oui | Même règle de recordset explicite |
| Méthode personnalisée à paramètres nommés | Oui | Oui via `execute_kw(..., [], $options)` | Le client natif est recommandé |
| Méthode inconnue avec positionnels | Appel natif nommé possible | Non par défaut | Ajouter une signature exacte ; aucune heuristique sur le préfixe `action_` |
| Résultat `null` ou flottant | Oui | Non | La façade lève `Json2CompatibilityException`, sans conversion arbitraire |
| Résultat métier contenant des clés `result` ou `error` | Oui | Oui | Ces clés restent des données métier, elles ne sont pas interprétées comme une enveloppe native |
| Service `common` | Non émulé | Non pris en charge | Pas d'authentification RPC préalable ni de `version()` historique fabriqué |
| Service `db` | Non émulé | Non pris en charge | Aucune administration de base via JSON-2 dans cette livraison |
| Requête RPC brute via le request maker compatible | Sans objet | Refusée | Lève `Json2UnsupportedCallException` avant HTTP |

`request()` sur la façade n'est pas un tunnel RPC. Sa seule grammaire est
`request('execute_kw', [$model, $method, $arguments?, $options?])`. Les getters
`getService()` et `getEndpointPath()` conservent respectivement `object` et
`/object` comme valeurs logiques ; ils ne décrivent pas l'URL JSON-2 réseau.

## Connexion, isolation et erreurs

`Json2Connection` est immutable. `withBaseUri()`, `withDatabase()` et
`withApiKey()` créent de nouvelles connexions sans exposer la clé. Sur la
façade, `setDatabase()`, `setPassword()` et le `setBaseUri()` du request maker
reconstruisent le client et invalident le UID et la dernière réponse. Un
changement de login invalide également le UID et la réponse locale. Deux
builders ne partagent aucun cache mutable.

Les signatures ORM génériques livrées sont vérifiées contre
`odoo/odoo@cd992ceebbaf343c03e1941d39cfe423d35ba6c6`. Cette provenance ne rend
pas le mapper permissif : les collisions, positionnels supplémentaires et
options inconnues restent des erreurs avant HTTP, et une surcharge exacte de
modèle/méthode garde la priorité.

Le comportement d'erreur est le suivant :

| Cas | Client natif | Façade |
| --- | --- | --- |
| Erreur PSR-18 ou délai réseau | `Json2TransportException` | Propagée, jamais convertie en refus métier |
| Corps vide ou JSON invalide | `Json2DecodingException` | Propagée |
| HTTP non-2xx | `Json2HttpException` | 4xx vers `ClientErrorException`, 5xx vers `ServerErrorException` |
| Résultat incompatible avec l'union historique | Valeur native disponible | `Json2CompatibilityException` |
| Appel non pris en charge | Selon l'appel natif nommé | `Json2UnsupportedCallException` ou erreur de mapping avant HTTP |

Les exceptions publiques n'incluent ni clé, ni headers, ni paramètres, ni
traceback, ni corps serveur complet dans leur message. Ne journaliser ni les
requêtes PSR complètes ni les détails contrôlés par le serveur sans appliquer
une politique de redaction.

Il n'existe aucun retry automatique et aucun fallback entre JSON-2, JSON-RPC et
XML-RPC. Cette règle est particulièrement importante pour `create`, `write`,
`unlink` et les actions : après une coupure réseau, l'état de la transaction
peut être inconnu du client.

Dans la suite d'intégration, toute construction est enveloppée par une garde
testable avec doubles. Sans les deux opt-ins et les confirmations locales, une
mutation est refusée avant réseau. Avant la première écriture ou action, une
lecture de `ir.module.module/search_read` doit prouver que le module `base`
ciblé est en version 19.x ; ce contrôle ne dépend pas de l'ordre ni du filtre
PHPUnit. Une réponse invalide, une mauvaise version ou un refus HTTP empêche la
mutation. Une réponse perdue après envoi ne déclenche aucun rejeu automatique.
Le garde refuse également de muter un autre hôte/préfixe ou une autre base que
la cible autorisée lors de sa construction. Son précontrôle est lié à la cible
et à la clé, et non à un simple booléen global.

## Configuration sûre

- Stocker la clé dans un gestionnaire de secrets ou une variable injectée au
  processus ; ne jamais la committer.
- Ne pas passer la clé en argument de ligne de commande, query string ou URL.
- Utiliser HTTPS et une origine explicitement approuvée. Le transport refuse les
  segments de modèle/méthode dangereux et n'effectue aucun fallback.
- Désactiver le suivi automatique des redirections inter-origines dans tout
  client PSR-18 injecté : le standard ne permet pas au client JSON-2 d'imposer
  cette politique à l'adaptateur qui reçoit la requête avec son Bearer.
- Affecter une clé dédiée, à privilèges minimaux, puis planifier sa rotation et
  sa révocation.
- Configurer explicitement la base lorsque plusieurs bases sont accessibles ;
  elle est transmise par `X-Odoo-Database`.
- Ne pas traiter un mot de passe utilisateur historique comme une clé JSON-2.
  Le credential JSON-2 doit être fourni explicitement.
- Ne jamais injecter une clé réelle dans des fixtures, captures HTTP, rapports
  de CI ou messages d'exception.

### Génération de modèles en JSON-2

La commande historique reste en RPC par défaut. Pour sélectionner JSON-2, la
clé doit déjà être injectée dans `ODOO_JSON2_API_KEY`; elle n'est jamais
acceptée dans `--password` :

```shell
vendor/bin/odoo-model-classes-generator \
    --api=json2 \
    --host=https://example.odoo.com/reverse-proxy \
    --database=odoo-test \
    ./build/Odoo/Model/Object \
    "App\\Odoo\\Model\\Object"
```

Le binaire lit aussi `ODOO_JSON2_HOST`, `ODOO_JSON2_DATABASE` et
`ODOO_JSON2_USERNAME`. Les deux premières remplacent les valeurs RPC par défaut
quand les options correspondantes ne sont pas fournies. Le nom d'utilisateur
reste un libellé de compatibilité non vérifié; seule la clé détermine l'identité
Odoo. L'aide `--api=json2 --help` reste disponible sans clé et n'affiche aucun
credential.

## Migration progressive et retour arrière

1. Inventorier chaque usage RPC et le classer avec la matrice ci-dessus.
   Conserver en RPC les appels `common`, `db` et les signatures non couvertes.
2. Créer un `Json2ApiClientBuilder` à côté du `OdooApiClientBuilder` existant.
   Ne pas remplacer la configuration globale ni partager leurs credentials.
3. Commencer par des lectures déterministes. En environnement de validation,
   comparer JSON-2 et RPC sans journaliser de données sensibles, puis basculer
   une famille de lectures derrière un feature flag.
4. Vérifier les champs, dates, relations et contextes multi-sociétés/langue avec
   les modèles réellement déployés avant d'élargir le trafic.
5. Migrer ensuite les écritures, une opération à la fois. Ne jamais faire de
   dual-write JSON-2/RPC et ne jamais rejouer automatiquement une écriture ou
   une action après timeout.
6. Pour chaque écriture, définir avant activation un moyen métier de vérifier
   l'effet obtenu : identifiant retourné, clé métier unique, état attendu ou
   journal d'audit côté Odoo.
7. Migrer les actions enregistrées seulement après avoir validé leurs droits et
   leur contexte sur la base jetable Odoo 19.

Le retour arrière consiste à désactiver le feature flag pour les appels futurs
et à réutiliser le builder RPC conservé. Il ne doit jamais relancer
automatiquement une requête dont l'issue est ambiguë. Après un timeout sur une
écriture, réconcilier d'abord l'état côté Odoo avec la clé métier ou l'audit,
puis décider explicitement de poursuivre, compenser ou relancer. Une rotation
ou révocation de clé reste une opération distincte du rollback applicatif.

## Checklist de revue finale

Les preuves cochées ont été obtenues localement sur la cible Docker dédiée.
La matrice GitHub et les validations propres au déploiement restent ouvertes :

- [x] Confirmer la révision ou l'image exacte d'Odoo 19 utilisée.
- [x] Valider les lectures JSON-2 sur une base jetable dédiée.
- [x] Valider séparément les écritures et actions avec autorisation explicite.
- [x] Vérifier `create`, `write`, `unlink`, `action_post` et
  `action_create_payments` avec leurs effets serveur.
- [x] Vérifier `fields_get`, `default_get`, les managers, dates et relations sur
  les modèles générés de l'instance de test.
- [x] Vérifier les contextes `allowed_company_ids` et `lang` avec les droits de
  l'utilisateur porté par la clé.
- [x] Confirmer localement que l'aide et les erreurs de la CLI ne révèlent
  aucune clé.
- [x] Confirmer avec des doubles la sélection opt-in JSON-2 dans la CLI, sans
  changer le défaut RPC.
- [x] Exécuter une génération JSON-2 réelle sur l'instance jetable et charger
  les classes obtenues.
- [ ] Exécuter la matrice CI Odoo 17/18/19 historique et JSON-2 sur Odoo 19.
- [x] Confirmer qu'aucun test d'intégration JSON-2 n'a été compté comme réussi
  lorsqu'il était ignoré faute de configuration.
- [x] Rejouer les tests de non-divulgation avec une sentinelle fictive.
- [x] Vérifier localement l'absence de retry, fallback et dual-write
  automatiques.
- [x] Vérifier la liste finale des fichiers et l'absence de changement de
  dépendance, manifest ou lockfile non autorisé.
- [ ] Documenter les limites restantes et le plan de rollback validé par
  l'équipe exploitante.
