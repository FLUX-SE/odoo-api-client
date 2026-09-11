# Plan délégable : ajout d'Odoo JSON-2 sans rupture

## Mandat commun à tous les sous-agents

Lire d'abord [l'analyse de faisabilité](json2-migration-analysis.md). Travailler à partir de la branche `json-2-api`, référence d'analyse `2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2`. Ce plan prépare l'implémentation ; aucun lot n'est déjà réalisé par la seule rédaction des documents.

**Objectif de livraison :** JSON-2 opt-in sur Odoo 19 pour les opérations couvertes, sans régression du client historique ni obligation de migration des consommateurs. Ne pas présenter `common`, `db` ou tout appel positionnel arbitraire comme automatiquement transposables.

### Règles non négociables

- Conserver toutes les interfaces existantes sans ajout obligatoire, leurs types, noms de paramètres PHP, valeurs par défaut, constructeurs, méthodes et propriétés publiques/protégées exposées. Conserver les formats RPC, DTO et fonctions publiques.
- L'ancien `OdooApiClientBuilder` garde JSON-RPC par défaut et XML-RPC explicite ; préserver ses possibilités d'injection et ses classes d'opérations personnalisées.
- Nouveau builder JSON-2 distinct ; configuration API key explicite ; aucun traitement implicite d'un mot de passe utilisateur comme clé valide.
- Pas de réécriture générale des managers, normalizers ou générateurs ; réutiliser les interfaces et la normalisation métier lorsque les tests l'autorisent.
- Pas d'autodétection en essayant successivement les protocoles, pas de fallback silencieux, pas de retry automatique des écritures ni des actions.
- Pas de dépendance externe nouvelle ou mise à jour sans autorisation ; PSR et composants présents suffisent a priori. Aucun changement opportuniste des manifests/lockfiles.
- Jamais de clé réelle dans une fixture, une commande, une URL, l'aide CLI, les logs, les exceptions affichées ou un rapport. Fournir les secrets par mécanisme sécurisé à l'exécution ; utiliser des sentinelles fictives pour les tests de non-divulgation.
- Les tests qui écrivent dans Odoo ne tournent que sur une instance/base jetable autorisée. Aucune opération d'administration de base dans la première livraison.
- Un défaut préexistant est caractérisé puis signalé, pas réparé silencieusement sous couvert de migration.

## Orchestration et responsabilité des fichiers

| Lot | Agent / rôle | Dépendances | Périmètre principal |
| --- | --- | --- | --- |
| A | Contrats et architecture | Aucune | Tests de caractérisation, document d'architecture, fixtures minimales partagées |
| B | Transport JSON-2 | A validé | Nouveaux fichiers transport natif, codec, erreurs et tests associés |
| C | Traduction des appels | A validé | Nouveau registre de signatures, mappers purs et tests associés |
| D | Façade et assemblage | B + C validés | Adaptateur `ObjectOperationsInterface`, builder JSON-2, tests de composition |
| E | Génération et CLI | D validé | Branchement CLI opt-in, génération, tests console |
| F | Intégration et CI | A pour préparer ; D puis E pour finaliser | Nouvelles suites d'intégration, provisioning isolé, workflow CI |
| G | Documentation et revue finale | D pour commencer ; E + F pour clôturer | README, guide utilisateur, revue de compatibilité et sécurité |

Après A, **B et C s'exécutent en parallèle** ; F peut préparer les tests sans toucher leurs fichiers. Après D, **E et F peuvent avancer en parallèle** sur des fichiers distincts ; G peut préparer les exemples. La validation CLI finale de F dépend de E. Le responsable d'intégration est seul propriétaire des changements dans les fichiers historiques partagés et des fusions.

Chaque sous-agent travaille dans son propre worktree ou périmètre de fichiers ; pas de modification concurrente du même fichier. Si un changement de contrat partagé paraît nécessaire, arrêter ce changement, prévenir l'intégrateur et faire réviser A avant de continuer. Pas de push, publication ou déploiement automatique.

Livrable de chaque lot : fichiers modifiés, comportement livré, tests ajoutés, commandes réellement exécutées, codes de sortie, résultats et limites. Une absence d'instance ou de clé est un blocage de validation, jamais un test implicitement réussi.

## Lot A — Geler les contrats et prouver le point d'extension

**Mission à déléguer :** « Caractérise la référence sans changer son comportement. Fige les nouveaux contrats internes JSON-2 et démontre qu'un adaptateur peut réutiliser les opérations actuelles. »

### Travaux

1. Produire un inventaire vérifiable de tous les symboles exportés : 34 interfaces repérées, classes non internes, constructeurs, membres publics/protégés, constantes, fonctions, types, defaults et noms des paramètres. Inclure les classes abstraites extensibles et les conventions de classes générées. Construire les fixtures à partir de la référence, pas après les modifications.
2. Ajouter des tests de caractérisation avec un faux client PSR-18, sans serveur : JSON-RPC/XML-RPC, builder par défaut, injections, services, enveloppes, décodage scalaire/tableau, exceptions, `getLastResponse()` et sérialisation des relations/domaines/options.
3. Caractériser séparément les anomalies connues : prédicats `isJsonRpc()`/`isXmlRpc()`, caches de connexion/UID, `fields_get` avec liste non vide, `search_count` avec `SearchOptions`, arguments absents `[[]]`. Ne pas transformer une anomalie observée en nouvelle promesse fonctionnelle ; documenter la politique de non-régression choisie.
4. Créer `docs/json2-architecture.md` : noms et signatures exactes des nouvelles classes/interfaces, namespaces, ownership, sémantique des erreurs et séparation natif/compatibilité. Les noms ci-dessous sont proposés, à confirmer une seule fois dans ce lot.
5. Définir un contrat natif `Json2ClientInterface` avec une opération HTTP nommée retournant `ResponseInterface` et un décodage acceptant toutes les valeurs JSON. Définir une connexion isolée hôte/base/clé, les factories PSR et le registre modèle/méthode.
6. Définir `Json2ObjectOperations`, implémentant l'interface existante, et `Json2ApiClientBuilder`, sans imposer l'ancien builder aux services non disponibles. Prévoir l'assemblage des classes `RecordOperations`, `RecordListOperations`, `InspectionOperations` existantes et d'une classe d'opérations tierce de test.
7. Prouver avec des réponses HTTP simulées : `search_read`, création unitaire `[id]` vers `int`, action avec ID scalaire, objet métier contenant `result`/`error`, flux relu après décodage et erreur structurée. Pas d'émission réelle ni de création serveur nécessaire pour ce prototype.

### Décisions obligatoires avant B/C/D

- La façade fournit une **enveloppe JSON-RPC synthétique** pour les résultats compatibles, jamais envoyée sur le réseau ; l'API native fournit la vraie réponse JSON-2. Le helper historique ne doit jamais décoder directement un objet JSON-2 arbitraire.
- Définir l'identifiant de corrélation de la réponse synthétique, ses métadonnées HTTP cohérentes avec le corps modifié, son stream et le lien avec la réponse native. Aucun statut de succès fabriqué pour masquer une erreur.
- Inventorier **chaque méthode héritée** de `ObjectOperationsInterface`/`OperationsInterface` et des objets exposés : notamment `request()`, `getService()`, `getEndpointPath()`, `getApiRequestMaker()`, `getRequestBodyFactory()`, `getRpcSerializerHelper()`, `getLastResponse()` et `setBaseUri()` du request maker. Fixer chemin logique versus URL réseau et prédicats de protocole ; ne pas réutiliser le dispatch défectueux d'`AbstractOperations::request()`.
- Les appels directs au request maker de compatibilité doivent avoir une grammaire explicite et testée ; ils ne doivent pas envoyer accidentellement une enveloppe RPC au serveur JSON-2. Une capacité non implémentable est déclarée non prise en charge, pas simulée par un résultat plausible.
- `retrieveUid()` obtient l'identité réelle via `res.users/context_get` uniquement sur demande ; préciser lecture du champ UID, cache et invalidation. Aucun UID inventé, aucune authentification RPC préalable aux appels métier.
- Les anciens noms `username`/`password` existent uniquement sur la façade de compatibilité : définir et documenter la clé comme credential explicite dans ce mode et le login comme simple libellé de compatibilité local, non vérifié et non comme sélection d'utilisateur. Ne jamais présenter un changement de login comme une preuve ou un changement de l'identité portée par la clé.
- Les changements d'hôte/base/clé invalident l'état du nouveau chemin sans contaminer d'autres clients. Définir ce que font les setters de façade, y compris le changement de login ; une limitation doit être explicite et testée.
- Les résultats `null`/`float` sont supportés nativement ; la façade garde son union historique et lève une exception documentée pour un résultat incompatible, sans conversion arbitraire.
- Le registre contient la nature modèle/recordset, les noms/positions, les règles de retour et la provenance versionnée. Les signatures inconnues nécessitant une interprétation sont refusées avant appel.

**Acceptation A :** tests de référence verts ou écarts préexistants expliqués ; aucune modification obligatoire d'interface ; preuve des cas ci-dessus ; fichier d'architecture assez précis pour que B et C ne prennent aucune décision contradictoire. Si le prototype invalide la stratégie de façade, réviser l'architecture avant de déléguer B/C, sans annoncer de compatibilité non démontrée.

## Lot B — Transport, codec et erreurs natifs

**Mission à déléguer :** « Implémente uniquement le client HTTP JSON-2 natif et ses tests, selon A ; ne touche pas au transport RPC existant. »

### Travaux

- Ajouter les fichiers dédiés dans des namespaces JSON-2 sous `src/Api/`, `src/Serializer/` et, si utile, `src/HttpClient/`. Réutiliser PSR-18/PSR-17 et la normalisation métier existante sans injecter les codecs RPC dans les réponses natives.
- Construire l'URL `/json/2/<model>/<method>` à partir d'une origine/configuration validée. Préserver un préfixe de reverse proxy ; empêcher modèle/méthode de changer d'origine ou d'injecter un autre chemin.
- Émettre `Content-Type: application/json; charset=utf-8`, Bearer, base optionnelle et User-Agent. Ne pas ajouter UID/login/mot de passe aux paramètres. Connexions isolées ; clé remplaçable par reconstruction/configuration contrôlée.
- Encoder la racine et `context` vide en objets JSON (`{}`), les IDs/domaines/commandes relationnelles en listes ; garder les dictionnaires vides de valeurs quand la signature en exige. Validation des clés nommées, Unicode, nombres, booléens, `null` et erreurs d'encodage.
- Décoder sans extraire des clés métier `result`/`error` ; conserver tableaux, objets selon convention A, entiers, flottants, chaînes, booléens, `null`. Gérer JSON invalide, réponse vide inattendue, profondeur, streams relisibles et non seekables selon le contrat fixé.
- Traiter erreurs HTTP JSON et non JSON avant perte d'information par un plugin générique. Préserver statut, nom d'erreur et réponse originale via accès contrôlé ; messages par défaut sans dump de requête, headers, contexte, arguments ou traceback.
- Tester 401, 403, 404, 422, 429, 500, HTML de proxy, délai dépassé/erreur réseau et réponses malformées. Aucun retry automatique ; redirections vers une autre origine refusées ou sans transmission du Bearer, comportement de l'adaptateur PSR documenté.
- Ne pas brancher le logger historique sans vérifier ce qu'il affiche. Ajouter une sentinelle fictive et prouver son absence des logs, messages et représentations usuelles d'exception, y compris lorsque le serveur réémet des données sensibles.

**Acceptation B :** tests unitaires sans réseau, aucune enveloppe RPC sur le fil, aucune authentification secondaire, aucune fuite de credential, aucune modification des résultats RPC. La réponse native conserve `[id]` pour une création unitaire.

## Lot C — Registre et traduction des appels

**Mission à déléguer :** « Implémente des transformations pures et déterministes entre les appels historiques couverts et les paramètres JSON-2 nommés, sans transport ni autodécouverte. »

### Travaux

- Implémenter le registre et les mappers figés par A. Priorité à une signature `(modèle, méthode)` exacte, puis aux signatures ORM génériques ; extension possible sans modifier une interface historique.
- Couvrir toutes les lignes de la matrice d'analyse : CRUD, recherches, inspection, `default_get`, `check_access_rights`, `action_post`, `action_create_payments`. Vérifier les signatures sur la révision Odoo utilisée ; ne pas confondre `fields` Odoo 19 pour `default_get` avec d'autres versions.
- Séparer les conventions wrapper et bas niveau pour `fields_get` ; si nécessaire, ajouter une opération d'inspection JSON-2 dédiée plutôt que deviner si une liste plate désigne des champs ou des positionnels. Ne pas réinterpréter silencieusement les appels bas niveau déjà valides.
- Distinguer `[]`, `[[]]`, `null` et argument omis. Rejeter les collisions positionnel/mot-clé et `ids`/`context` ambiguës, sans perte d'options. Définir les options `search_count` autorisées ; aucune suppression d'option métier non neutre.
- Normaliser un ID scalaire en liste uniquement lorsque la signature enregistrée exige un recordset, notamment les deux actions réellement présentes dans les tests. Un tableau passé à une méthode modèle n'est pas nécessairement un recordset.
- Convertir `create` unitaire en `vals_list` à un élément ; appliquer la convention retour `int` seulement à cette forme. Créations multiples bas niveau : préserver la liste et tester explicitement le cas d'une liste de créations contenant un seul élément.
- Permettre l'appel natif nommé pour les méthodes personnalisées. Un appel positionnel inconnu, même nommé `action_*`, échoue avant HTTP ; pas de règle heuristique basée sur le préfixe du nom.
- Les valeurs de retour non compatibles avec l'union historique produisent l'erreur définie par A. Ne pas convertir globalement `null` en `false`, les nombres en booléens ou les listes singleton en scalaires.

**Acceptation C :** tests tabulaires de chaque mapping, variantes vides/nul/false/zéro, cardinalité de création, surcharge de signature, méthodes inconnues et absence de perte des commandes relationnelles. Mapper sans réseau et sans secret.

## Lot D — Façade compatible, builder et managers

**Mission à déléguer :** « Assemble B et C derrière les contrats existants sans toucher à leurs signatures, et rends le nouveau chemin opt-in. »

### Travaux

- Implémenter tous les comportements de façade figés par A : réponses synthétiques, décodage historique, erreurs, accesseurs, appels bas niveau, UID sur demande, identité et invalidation. Les tests couvrent aussi l'accès aux objets exposés, pas seulement les méthodes CRUD.
- Ajouter le builder JSON-2 : connexion explicite, injection PSR-18/PSR-17, serializer métier et registre personnalisable. Ne pas modifier le défaut de l'ancien builder ni lui ajouter une obligation de supporter JSON-2.
- Réutiliser les wrappers existants lorsque prouvé ; une variante JSON-2 spécifique doit toujours respecter l'interface concernée et être clairement nommée. Ne pas faire retourner une autre classe par l'ancien `buildExecuteKwOperations(className, …)`.
- Tester avec `ModelManager`, `ModelListManager`, providers et modèles : création entière, write/unlink booléens, find absent, count, pagination, champs, dates, many2one/one2many/many2many et contexte multi-sociétés/langue.
- Reproduire les appels d'actions utilisés par `tests/Manager/ModelManagerTest.php` et le `default_get` de `SelectionTypeDefaultValueAdder`. Tester les classes d'opérations tierces qui dépendent des anciens accesseurs.
- Conserver les familles d'exceptions attendues par le code historique lorsque la façade traduit une erreur : le générateur intercepte notamment `ClientErrorException`. Documenter la correspondance par cas, sans transformer une panne réseau en refus métier ou un 5xx en succès.
- Vérifier deux clients simultanés (hôtes/bases/identités différentes), remplacement de clé, setters, request/lastResponse et absence de contamination par le cache du builder historique.

**Acceptation D :** mêmes types et comportements observables pour les cas annoncés compatibles ; tests sans réseau des anciens et nouveaux chemins verts ; clients historiques inchangés ; liste explicite des capacités non migrées, sans stubs renvoyant de faux résultats.

## Lot E — Générateur et interface de commande

**Mission à déléguer :** « Rends la génération utilisable en JSON-2 par configuration explicite, sans casser la commande historique ni exposer de clé. »

### Travaux

- Étudier `bin/odoo-model-classes-generator` et `GeneratorCommand` ensemble : l'assemblage précède aujourd'hui la lecture des options. Définir le branchement de protocole une seule fois, avec le même objet d'opérations pour inspection, lecture et commande.
- Option de protocole additive, par exemple `--api=json2`, et/ou variable de configuration dédiée ; ancien défaut inchangé. Garder les options existantes. Charger la clé depuis une variable dédiée, un fichier protégé ou l'entrée standard, jamais recommander sa valeur dans argv.
- Traiter les reconfigurations d'hôte sans remettre `/jsonrpc` sur un client JSON-2. Tester préfixes de proxy, options surchargées et base choisie.
- Éviter tout affichage de secret dans `--help`, messages d'erreur et mode verbeux. La suppression du secret actuellement interpolé dans l'aide est une correction de sécurité localisée, sans suppression de l'option historique.
- Réutiliser le générateur, providers et model fixers. Sortie dans un répertoire temporaire dédié, jamais régénérer/remplacer les classes du consommateur pour tester la migration.
- Tests console avec doubles, sans serveur, puis génération d'un petit modèle sur l'instance isolée F ; comparer signatures/types/relations des classes obtenues avec les conventions existantes, et vérifier leur chargement PHP.
- Ne pas dépendre de `CommonOperations::version()` pour tester ou amorcer JSON-2. Si nécessaire, utiliser `/web/version` via un nouveau résultat natif, sans inventer les champs manquants du DTO historique.

**Acceptation E :** aide sans secret, commande historique conservée, sélection JSON-2 cohérente dans toute la chaîne, génération et utilisation des modèles validées sans écrasement de fichiers existants.

## Lot F — Tests d'intégration et matrice CI

**Mission à déléguer :** « Apporte la preuve indépendante de compatibilité et de fonctionnement JSON-2 ; aucune validation contre une base métier. »

### Travaux

- Séparer les tests unitaires sans Odoo et les tests d'intégration. Ne pas exécuter aveuglément la suite existante avec une configuration locale : elle effectue des écritures métier et utilise des modèles générés.
- Garder la matrice existante Odoo 17/18/19 ; maintenir ou renforcer JSON-RPC/XML-RPC réellement exercés. Ajouter JSON-2 sur Odoo 19, sans créer des combinaisons non prises en charge sur 17/18.
- Préserver PHP >= 8.1 et Symfony 6.4/7.4 selon leur compatibilité ; ne pas considérer le seul résultat local PHP 8.5 comme preuve de la matrice.
- Provisionner une instance Odoo 19 jetable avec révision/image identifiée et un utilisateur dédié. Générer une clé éphémère via un mécanisme serveur de test, transmise de manière sécurisée, pas via un login RPC pour chaque test. Documenter droits/modules prérequis et fin de vie de la clé/base.
- Ajouter une configuration de tests versionnée sans secrets réels, un indicateur explicite autorisant les écritures de test, une garde sur la base jetable et des fixtures déterministes. Nettoyer uniquement les enregistrements créés par cette exécution ou laisser détruire l'instance jetable ; pas de suppression large d'une base existante.
- Tester CRUD complet, recherche vide/complexe, recherche+lecture atomique, inspection filtrée, droits refusés, mauvaise clé, clé expirée/révoquée si fixture disponible, contexte de langue/société, actions et modèle personnalisé à paramètres nommés.
- Sur un même Odoo 19, comparer les valeurs publiques des mêmes scénarios RPC/JSON-2 avec données contrôlées ; ne pas exiger les mêmes IDs pour deux créations différentes. Contrôler cardinalités, types, champs et effets plutôt qu'un corpus métier non déterministe.
- Vérifier que `search_read` et chaque action émettent exactement un appel métier ; pas de fallback/rejeu après erreur réseau. Tester les refus préalables de signatures inconnues.
- Ne pas utiliser `CommonOperationsTrait` pour connaître la version d'un test JSON-2 : version fixée par la fixture ou endpoint natif. Intégrer ensuite les tests CLI et génération de E.
- Ajouter une garde automatisée des signatures historiques et exécuter analyse statique, style et validation Composer sans nouvelle dépendance de compatibilité non autorisée.

**Acceptation F :** CI historique préservée, job JSON-2 réellement exécuté et vert, aucun test essentiel seulement ignoré ; rapports de commandes, versions et suites. Une indisponibilité d'Odoo bloque le statut « validé en intégration », pas nécessairement les tests unitaires.

## Lot G — Documentation, revue et livraison

**Mission à déléguer :** « Documente la migration réelle, puis vérifie indépendamment que la livraison respecte ses limites et la rétrocompatibilité. »

- Actualiser le README sans remplacer les exemples historiques par des exemples JSON-2 uniquement. Ajouter un guide : ancienne construction, nouvelle construction, méthodes personnalisées avec registre ou paramètres nommés, managers et CLI.
- Indiquer Odoo 19, prérequis de clé/droits/forfait, base optionnelle, expiration/rotation de clé et contexte. Pas de création/révocation automatique de clés en production dans cette première livraison.
- Distinguer réponses natives et réponses synthétiques de façade, création unitaire/multiple, exceptions et résultats racines non représentables historiquement.
- Publier une matrice de capacités : ORM couvert, signatures personnalisées configurables, services common/db historiques non remplacés. Décrire l'absence de fallback et l'absence de garantie de transaction multi-appels.
- Donner un parcours progressif : migrer un client de lecture, valider, migrer CRUD puis actions sur staging, garder la possibilité de reconfigurer explicitement un client RPC tant que le serveur le fournit. Aucun rollback automatique d'une écriture ; une réponse perdue doit être réconciliée avant rejeu.
- Revue des signatures, constructors/defaults, classes tierces, erreurs interceptées, logs/CLI, secrets, dépendances, matrice PHP/Symfony/Odoo et diff de génération. Revalider le calendrier officiel Odoo au moment de la publication.

**Acceptation G :** guide conforme au code testé, liste des limites visible, revue de non-régression achevée. Publication d'une version additive uniquement après validation complète et décision du mainteneur ; pas de suppression des transports historiques.

## Commandes et preuves attendues

### Référence déjà exécutée pendant l'analyse

`vendor/bin/phpunit --no-configuration --bootstrap vendor/autoload.php --do-not-cache-result tests/Operations/Object/ExecuteKw/Arguments`

Code 0 : 26 tests, 26 assertions, PHP 8.5.10 / PHPUnit 10.5.63. Cette preuve couvre les arguments/domaines, pas HTTP ni JSON-2.

### À exécuter pendant l'implémentation

- Pour chaque lot : son fichier de tests, puis son répertoire/suite ; tests unitaires avec configuration sans secrets ni serveur, notamment doubles PSR-18.
- À l'intégration : suites RPC et JSON-2 dans la configuration isolée F ; pas de commande de suite complète copiée vers une base inconnue.
- Contrôles existants : `vendor/bin/ecs check src tests`, `vendor/bin/phpstan analyse`, `composer validate --strict`. PHPStan dépend actuellement des classes Odoo générées : préparer les fixtures requises avant d'interpréter les erreurs de classes absentes.
- Contrôle du diff : `git diff --check` ; garde des signatures historiques contre la référence A ; absence de modification non autorisée de dépendances ou de classes générées.
- Un échec préexistant est rapporté séparément et prouvé sur la référence. Un échec introduit est corrigé puis rejoué. Ne pas masquer les erreurs en diminuant les assertions ou en excluant les protocoles historiques.

## Définition de terminé et points d'arrêt

La livraison est terminée lorsque A à G sont acceptés, que les tests des consommateurs historiques passent, que JSON-2 fonctionne réellement sur l'instance isolée et que les limites sont documentées. La présence de nouvelles interfaces ou de mocks verts, seule, ne suffit pas.

Arrêter et demander une décision ciblée si l'implémentation exige une rupture d'un contrat existant, un changement de défaut, une nouvelle dépendance, l'exécution contre une base non jetable, une prise en charge universelle des services supprimés, ou un module serveur supplémentaire. Aucun de ces points ne bloque la rédaction ni le démarrage du lot A.
