# Migration Odoo JSON-2 : faisabilité et décisions

## Référence et portée

- Analyse du 11 septembre 2026, branche `json-2-api`.
- Référence locale : `2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2`, également tête de `master` au moment de l'analyse ; arbre de travail initial propre.
- Demande : préparer une migration sans casser les contrats disponibles dans le dépôt. Cette étape ajoute uniquement de la documentation, pas l'implémentation.
- Plan d'exécution : [json2-migration-plan.md](json2-migration-plan.md).

## Conclusion

**Oui à l'ajout de JSON-2 sans rupture pour les consommateurs existants. Non à un remplacement universel et transparent de tous les services RPC par JSON-2 seul.**

L'hypothèse conservatrice retenue est une migration additive : JSON-RPC reste le défaut, XML-RPC reste disponible, et JSON-2 s'active explicitement avec une clé API. Les interfaces, classes publiques, constructeurs, arguments nommés PHP, valeurs par défaut et comportements historiques restent disponibles. Les traitements métier peuvent migrer progressivement, sans imposer le changement aux autres consommateurs.

Cette rétrocompatibilité de la bibliothèque ne peut pas maintenir un service supprimé du serveur Odoo. Les capacités non transposables restent identifiées comme historiques, et ne doivent pas être présentées comme prises en charge en JSON-2. Si l'objectif devient « tous les usages, sur un serveur sans RPC, sans aucune modification de configuration ou de code appelant », une décision utilisateur supplémentaire sera nécessaire : le plan ci-dessous ne prétend pas satisfaire cette exigence impossible en général.

## Ce que change réellement JSON-2

Documentation officielle Odoo 19.0 et code serveur consultés, liens en fin de document :

| Sujet | RPC actuel | JSON-2 |
| --- | --- | --- |
| Endpoint | `/jsonrpc` ou `/xmlrpc/2/<service>` | `POST /json/2/<model>/<method>` |
| Authentification | Base, login puis UID, mot de passe ou clé dans les paramètres | Clé API dans `Authorization: bearer …`, pas de login préalable |
| Base | Paramètre du service | `X-Odoo-Database`, facultatif selon le routage de l'instance |
| Arguments | Positionnels et mots-clés | Objet JSON de paramètres exclusivement nommés ; `ids` et `context` réservés |
| Succès | Enveloppe RPC | Valeur JSON directement, HTTP 200 |
| Erreur | Notamment fault dans une réponse HTTP 200 | HTTP 4xx/5xx, objet `name`, `message`, `arguments`, `context`, `debug` |
| Recordset retourné | Conventions de l'adaptateur RPC | Liste des identifiants, notamment pour `search` et `create` |
| Transaction | Un appel serveur | Un appel serveur ; pas de transaction commune à plusieurs requêtes |

JSON-2 est documenté comme nouveau dans Odoo 19.0. Le premier périmètre validé doit donc être Odoo 19 ; ne pas annoncer JSON-2 sur Odoo 17/18. Pour les offres Odoo hébergées, vérifier l'accès API du forfait : la documentation indique Custom, pas Standard/One App Free. Vérifier aussi les modules, droits, règles d'enregistrement et champs de l'instance cible.

Le calendrier officiel a évolué : la page 19.0 annonce la suppression RPC en Odoo 22 (automne 2028). La documentation `master` distingue `db` (Odoo 20 / Online 19.1) de `common` et `object` (Odoo 22 / Online 21.1). Revalider ces échéances avant publication ; ne pas reprendre l'ancienne annonce générale « suppression en Odoo 20 ».

## Inventaire des contrats et des points de couplage

34 fichiers d'interfaces suivis par Git ont été repérés. L'inventaire automatisé exhaustif des symboles publics/protégés est un livrable du lot A ; la présente analyse couvre les chemins déterminants de la migration.

| Surface | Fichiers repères | Engagement |
| --- | --- | --- |
| Assemblage et injection | `src/Builder/OdooApiClientBuilder{,Interface}.php` | Garder défaut JSON-RPC, chemins, signatures, setters, injection PSR-18 et instanciation des classes d'opérations personnalisées |
| HTTP et corps RPC | `src/Api/`, `src/HttpClient/Factory/`, `src/HttpClient/Plugin/OdooApiErrorPlugin.php` | Garder interfaces PSR, accès à la dernière réponse, formats et exceptions historiques |
| Services bas niveau | `src/Operations/{OperationsInterface,AbstractOperations,CommonOperations,ObjectOperations,DbOperations}.php` et interfaces associées | Ne supprimer aucune méthode ; distinguer services historiques et capacités JSON-2 |
| Opérations métier | `src/Operations/Object/ExecuteKw/` | Garder interfaces, domaines, options, CRUD, inspection et appels d'actions |
| Modèles et managers | `src/Model/`, `src/Manager/`, `src/Provider/`, `src/PropertyAccess/` | Garder modèles, relations, types, résultats et injection par interfaces |
| Sérialisation | `src/Serializer/`, dont `RpcSerializerHelperInterface` | Garder formats RPC et normalisation Odoo ; codec JSON-2 distinct |
| Génération et CLI | `src/PhpGenerator/`, `src/Command/GeneratorCommand.php`, `bin/odoo-model-classes-generator`, `src/functions.php` | Garder usages historiques, paramètres et conventions des classes générées |
| Plateforme | `composer.json`, `.github/workflows/build.yml` | PHP >= 8.1 ; Symfony 6.4/7.4 selon compatibilité PHP ; préserver la CI Odoo 17/18/19 |

Points vérifiés dans le code :

1. `ObjectOperations::execute_kw()` appelle `retrieveUid()`, qui utilise `CommonOperations::authenticate()`. Cette séquence n'est pas nécessaire en JSON-2.
2. Les wrappers `ExecuteKw` dépendent de `ObjectOperationsInterface`, qui hérite aussi des accès bas niveau et du helper RPC : un adaptateur doit traiter tout ce contrat, pas uniquement `execute_kw()`.
3. `RecordOperations::create()` et `ModelManager::persist()` garantissent `int`. Le contrôleur JSON-2 transforme un recordset en liste d'IDs : il faut adapter strictement la création unitaire, pas convertir toutes les listes à un élément.
4. `RpcSerializerHelperInterface::decodeResponseBody()` et `execute_kw_action()` n'acceptent ni `null` ni `float` à la racine. Une nouvelle API native peut les accepter ; élargir ces retours changerait le contrat des consommateurs, même si des implémentations plus restrictives restent valides par covariance.
5. `JsonRpcDecoder` extrait `result` ou `error` lorsqu'ils existent. L'utiliser directement sur un objet métier JSON-2 contenant ces clés détruirait sa forme.
6. `OdooApiErrorPlugin` traite les faults HTTP 200 après le plugin d'erreurs HTTP. Le traitement JSON-2 doit analyser les 4xx/5xx sans perdre leur erreur structurée, et ne pas changer le comportement RPC.
7. Les arguments absents des wrappers deviennent `[[]]`, tandis que le bas niveau utilise `[]`. `SearchDomains::toArray()` ajoute volontairement un niveau de liste. Aucune de ces formes ne doit être aplatie globalement.
8. `InspectionOperations::fields_get()` transmet actuellement `$fields` directement comme liste d'arguments. Les tests ne couvrent que la liste vide ; une liste de noms non vide est un cas à caractériser, pas à corriger silencieusement dans la migration.
9. `SearchOptionsTrait` initialise `offset`, `order` et `limit`, mais `search_count` Odoo 19 n'accepte que `domain` et `limit`. Ne pas supprimer arbitrairement des options : tester et distinguer défauts neutres, options métier et erreur d'usage.
10. Le builder met en cache ses services par classe, pas par identité de connexion ; les setters ne réinitialisent pas tout. Le nouveau builder doit isoler les connexions sans modifier opportunément ces comportements historiques.
11. `OdooApiRequestMaker::isJsonRpc()` et `isXmlRpc()` comparent `preg_match()` à `false` : zéro signifie « pas de correspondance », mais reste différent de `false`. Ne pas fonder JSON-2 sur cette détection ; caractériser le problème RPC dans un lot séparé avant toute correction.
12. La commande recalcule un chemin `/jsonrpc` lors d'un changement d'hôte. Elle inclut aussi le secret par défaut dans la description de l'option `password`. Le chemin JSON-2 doit éviter ces deux comportements ; aucun nouveau secret dans l'aide, les traces ou les arguments du processus.

## Matrice de transposition

Les noms suivants ont été vérifiés dans le code ORM Odoo 19.0. Un module peut redéfinir une signature ; un registre spécifique modèle/méthode doit pouvoir prendre le pas sur les signatures ORM génériques.

| Appel actuel | Paramètres JSON-2 | Résultat / contrainte |
| --- | --- | --- |
| `search` | `domain`, `offset`, `limit`, `order` | `int[]`, inchangé |
| `search_count` | `domain`, `limit` | `int` ; attention aux autres options de recherche |
| `search_read` | `domain`, `fields`, `offset`, `limit`, `order`, paramètres de lecture acceptés | Liste d'enregistrements ; un seul appel, pas `search` puis `read` |
| `read` | `ids`, `fields`, `load` | Liste d'enregistrements ; garder les formes relationnelles et valeurs `false` |
| `create` unitaire | `vals_list` contenant un dictionnaire de valeurs | Retour natif `[id]` ; façade historique `int`, cardinalité exactement un |
| `write` | `ids`, `vals` | `bool`, sans conversion permissive |
| `unlink` | `ids` | `bool`, sans conversion permissive |
| `fields_get` | `allfields`, `attributes` | Dictionnaire ; distinguer l'appel wrapper de la convention positionnelle bas niveau |
| `default_get` | `fields` dans Odoo 19 | Dictionnaire ; utilisé par `SelectionTypeDefaultValueAdder`, ne pas supposer `fields_list` |
| `check_access_rights` | `operation`, `raise_exception` | Présent mais déprécié côté Odoo 19 ; ne pas le remplacer automatiquement par une méthode aux autres sémantiques |
| `account.move/action_post` | `ids`, `context` éventuel | Appel présent dans les tests ; convertir l'ID scalaire existant en liste, vérifier le résultat selon la version |
| `account.payment.register/action_create_payments` | `ids`, `context` éventuel | Appel présent dans les tests ; conserver le dictionnaire d'action |
| Méthode personnalisée | Signature nommée enregistrée explicitement | Impossible de déduire sûrement les noms ou le caractère recordset d'arguments positionnels arbitraires |

Pour `create`, envoyer systématiquement une liste de dictionnaires dans `vals_list` ; ne pas dépendre d'une tolérance serveur au dictionnaire seul. L'API native conserve la liste retournée, y compris pour une création unitaire ou multiple. Seule la façade de compatibilité applique la convention historique unitaire, avec une règle distincte pour les créations multiples bas niveau.

Les paramètres `context`/`ids`, les collisions positionnels/mots-clés, les valeurs `false`, `0`, `null`, les tableaux vides et les commandes relationnelles doivent être traités explicitement. Aucun filtrage global par `array_filter()`, aucune heuristique « premier argument = IDs », aucun écrasement silencieux de paramètres.

## Services qui ne peuvent pas être promis comme équivalents

- `retrieveUid()` : possible via `res.users/context_get` avec la clé et sans IDs. Vérifier que l'UID est réellement présent et entier ; jamais de faux UID ni login RPC préalable pour un appel métier JSON-2.
- `authenticate(database, username, password, userAgentEnv)` : pas d'équivalence générale avec l'authentification Bearer. Une clé désigne son utilisateur, pas le login fourni. Ne pas ignorer ce changement d'identité sous couvert de compatibilité.
- `version()` : `/web/version` utilise GET et fournit `version`/`version_info`. Le modèle actuel `Version` exige aussi `server_serie` et `protocol_version` ; ne pas fabriquer ces champs. Préférer un nouveau résultat natif et laisser le service historique inchangé.
- `about()` / `aboutExtended()` : pas d'équivalent documenté ; conserver le chemin historique.
- `DbOperationsInterface` : les contrôleurs `/web/database/*` utilisent plusieurs formats, du multipart, des redirections et d'autres conventions de résultats. Ce n'est pas JSON-2. `rename`, `db_exist` et `migrate_databases` n'ont pas de remplacement équivalent établi par cette analyse.
- Lister pays/langues par des modèles ne garantit pas les mêmes droits, arguments ou formes de retour que le service `db`. Une adaptation d'administration serait un projet séparé, avec validation explicite des opérations destructives.

## Architecture recommandée

1. **Conserver la pile existante et son builder.** Aucun nouveau membre obligatoire dans une interface existante ; pas de changement de défaut ni de suppression RPC.
2. **Ajouter une API JSON-2 native autonome** : paramètres nommés, authentification par clé, transport PSR-18/PSR-17, vraie réponse HTTP et codec JSON brut. Elle supporte les valeurs JSON racines que les anciens contrats ne permettent pas.
3. **Ajouter un registre de signatures explicites** : portée modèle/méthode, mode modèle/recordset, positionnels nommés, règles ciblées d'adaptation des résultats. Priorité au modèle précis puis à l'ORM générique. Pas de scraping de `/doc` ni dépendance réseau pour découvrir une signature à chaque appel.
4. **Ajouter une façade `ObjectOperationsInterface` opt-in** pour réutiliser les wrappers existants et les managers. Elle traduit les appels connus et fournit des réponses de compatibilité, séparées des réponses natives. Proposition retenue : enveloppe JSON-RPC synthétique côté façade, jamais envoyée au serveur, afin de réutiliser le helper RPC sans perdre les objets métier contenant `result`/`error`.
5. **Ajouter un builder JSON-2 distinct**, avec sa propre interface si nécessaire, et une configuration de connexion explicite. Ne pas l'obliger à implémenter l'ancien builder et à prétendre fournir `common`/`db`. Les classes nommées dans le plan sont des créations proposées, pas des symboles existants.

La façade est une aide à la migration, pas une émulation universelle. Une signature inconnue avec des positionnels est rejetée avant émission HTTP avec une erreur exploitable : enregistrer la signature, utiliser l'appel natif nommé ou conserver explicitement l'ancien client. Aucun fallback RPC après un échec JSON-2, aucun retry automatique d'écriture : le serveur peut avoir validé la transaction avant une coupure réseau.

Les détails de toutes les méthodes héritées, de `request()`, des accesseurs bas niveau et des réponses synthétiques doivent être figés et prouvés par le lot A avant parallélisation. Si cette façade ne peut pas satisfaire un cas, celui-ci doit rester déclaré non migré ; conserver une signature PHP ne suffit pas à prouver la compatibilité comportementale.

## Validation effectuée et limites

- Lecture du code client, de sa CI et des tests ; vérification documentaire et de signatures sur le code public Odoo 19.0.
- Commande exécutée : `vendor/bin/phpunit --no-configuration --bootstrap vendor/autoload.php --do-not-cache-result tests/Operations/Object/ExecuteKw/Arguments`.
- Résultat : code de sortie **0**, **26 tests / 26 assertions**, PHP **8.5.10**, PHPUnit **10.5.63**. Aucun serveur ni configuration d'authentification nécessaire à ce sous-ensemble.
- Pas de validation réelle JSON-2 ni de suite complète exécutée. Les tests d'opérations/managers font des appels réels et certains créent des produits, factures et paiements ; plusieurs tests dépendent aussi de classes générées et d'une version Odoo.
- Le succès de ces tests locaux ne prouve ni la compatibilité réseau, ni la matrice PHP/Symfony déclarée. Ces preuves sont des livrables du plan, sur un environnement de test isolé.

## Sources officielles consultées

- [API JSON-2 Odoo 19.0](https://www.odoo.com/documentation/19.0/developer/reference/external_api.html) : protocole, authentification, transactions, migration.
- [API JSON-2 master](https://www.odoo.com/documentation/master/developer/reference/external_api.html) : calendrier distinguant les services et Odoo Online.
- [Contrôleur JSON-2 Odoo 19.0](https://github.com/odoo/odoo/blob/19.0/addons/rpc/controllers/json2.py) : arguments nommés, validation des signatures, conversion des recordsets en IDs.
- [ORM Odoo 19.0](https://github.com/odoo/odoo/blob/19.0/odoo/orm/models.py) : noms des paramètres des méthodes standard.
- [Factures Odoo 19.0](https://github.com/odoo/odoo/blob/19.0/addons/account/models/account_move.py) et [assistant de paiement](https://github.com/odoo/odoo/blob/19.0/addons/account/wizard/account_payment_register.py) : actions utilisées par les tests.

Ces liens de branche peuvent évoluer. Le lot A doit enregistrer les révisions serveur réellement utilisées dans ses fixtures et ses tests d'intégration.
