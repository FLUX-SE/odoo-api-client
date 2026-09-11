# Tests d’intégration JSON-2

## Statut

Le runner Docker a été exécuté localement sur Odoo 19 : **46 tests, 181
assertions, aucun skip**, avec génération PHP, utilisateur non administrateur,
actions comptables et révocation vérifiée des clés. Le même runner est branché
dans la build GitHub ; sa première exécution distante reste à confirmer.
Le mode serveur partagé passe également : suite habituelle **281 tests / 959
assertions**, puis JSON-2 **46 / 181**, puis contrôle RPC **4 / 4**. Le conteneur
Odoo reste le même pendant toute cette séquence.

Prérequis : Docker avec Compose, Python 3, PHP et les dépendances Composer déjà
installées. Depuis la racine du dépôt, lancer :

<augment_code_snippet mode="EXCERPT">
````sh
python3 .github/json2/run.py --allow-writes
````
</augment_code_snippet>

Cette commande crée puis détruit son propre projet Compose. Elle ne réutilise
ni une instance Odoo existante ni les variables `ODOO_*` du shell appelant.
Sans runner/environnement opt-in, PHPUnit continue d'ignorer explicitement les
scénarios réseau ; ces skips ne constituent jamais une preuve serveur.

La configuration dédiée est `phpunit.json2-integration.xml`. Elle n'hérite pas
des identifiants RPC de `phpunit.xml.dist` et ne contient aucun hôte, login, mot
de passe ou clé par défaut. Réciproquement, `phpunit.xml.dist` exclut ce
répertoire d'intégration afin qu'une exécution historique ne puisse pas lancer
les scénarios JSON-2, même si des variables opt-in sont présentes.

## Environnement obligatoire

| Variable | Rôle |
| --- | --- |
| `ODOO_JSON2_INTEGRATION=1` | Opt-in explicite de la suite. |
| `ODOO_JSON2_HOST` | Origine HTTP(S), avec éventuel préfixe de reverse proxy. |
| `ODOO_JSON2_DATABASE` | Base créée exclusivement pour cette exécution ; son nom commence par `json2_test_`. |
| `ODOO_JSON2_API_KEY` | Clé éphémère de l’utilisateur de test autorisé. |
| `ODOO_JSON2_EXPECTED_MAJOR=19` | Garde déclarative ; la suite vérifie aussi la version installée du module `base`. |
| `ODOO_JSON2_DISPOSABLE_DATABASE` | Confirmation répétée, strictement identique à `ODOO_JSON2_DATABASE`. |
| `ODOO_JSON2_ALLOW_WRITES=1` | Second opt-in requis pour CRUD, factures, paiements et actions. |
| `ODOO_JSON2_RUN_ID` | Identifiant sûr et unique ajouté aux enregistrements de l’exécution. |
| `ODOO_JSON2_ACCOUNT_MOVE_ID` | ID facultatif d’une facture brouillon jetable préparée pour `action_post`. |
| `ODOO_JSON2_ACCOUNT_MOVE_COMPANY_ID` | Société attendue pour la facture `action_post`. |
| `ODOO_JSON2_ACCOUNT_MOVE_JOURNAL_ID` | Journal attendu pour la facture `action_post`. |
| `ODOO_JSON2_PAYMENT_REGISTER_ID` | ID facultatif d’un assistant de paiement jetable préparé pour `action_create_payments`. |
| `ODOO_JSON2_PAYMENT_MOVE_ID` | ID de la facture postée et impayée ciblée par l'assistant. |
| `ODOO_JSON2_PAYMENT_COMPANY_ID` | Société attendue pour la facture, l'assistant et les paiements. |
| `ODOO_JSON2_PAYMENT_MOVE_JOURNAL_ID` | Journal attendu de la facture de paiement. |
| `ODOO_JSON2_PAYMENT_JOURNAL_ID` | Journal attendu de l'assistant et des paiements créés. |
| `ODOO_JSON2_RESTRICTED_API_KEY` | Clé de l'utilisateur interne sans accès comptable. |
| `ODOO_JSON2_LOGIN` | Login du compte API, uniquement pour la comparaison RPC explicite. |
| `ODOO_JSON2_GENERATED_PATH` | Répertoire temporaire des classes générées par la CLI. |

Le runner génère les deux clés côté serveur, avec expiration à une heure. Il
les récupère dans un fichier temporaire de mode `0600`, sous un répertoire
`0700`, puis les transmet uniquement dans l'environnement des sous-processus.
Aucune clé n'est fournie dans argv, une URL, les sorties de test ou les
artefacts GitHub. Une fausse clé littérale couvre aussi le cas HTTP 401.

La garde refuse une version déclarée autre que 19, une confirmation de base qui
ne correspond pas exactement et une base sans le préfixe `json2_test_`. Une
condition absente provoque un skip explicite avant tout réseau. Une configuration
présente mais dangereuse fait échouer la suite. Tout builder créé par ce harnais
refuse aussi localement les mutations si le second opt-in et le run sûr ne sont
pas établis ; appeler le builder générique au lieu du helper d'écriture ne
contourne donc pas la garde.

Immédiatement avant la première méthode non explicitement classée en lecture
seule, le client d'intégration effectue une lecture authentifiée de
`ir.module.module/search_read` et valide `base.installed_version` en `19.x`.
Ce précontrôle est attaché au client, pas à un test séparé : il fonctionne donc
si PHPUnit ne sélectionne que les écritures ou actions. Mauvaise version, JSON
invalide, réponse incohérente, statut HTTP non-2xx ou refus de droits empêchent
l'envoi métier.
La cible effective doit rester l'hôte/préfixe et la base autorisés à la
construction du garde : reconfigurer une façade ne peut pas autoriser une
autre base. Le cache de précontrôle est lié à l'URL, la base et la clé ; une
rotation de credential oblige donc à revalider le serveur.

## Provisionnement et cycle de vie local

Le provisionneur `.github/json2/run.py` et les scripts associés :

1. démarrent les images officielles Odoo 19 Community et PostgreSQL 16 fixées
   par digest dans `.github/json2/compose.yaml` ;
2. créent `json2_test_ci` dans un projet Compose unique, avec PostgreSQL en
   `tmpfs` sur un réseau interne sans port publié, et Odoo sur un port aléatoire
   de `127.0.0.1` ;
3. attendent l'installation effective du module `json2_fixture`, qui dépend
   de `l10n_us_account` (`account` et `l10n_us` transitifs). En Odoo 19,
   `l10n_us` seul ne fournit pas la comptabilité ; aucun module Enterprise
   n'est nécessaire ;
4. configurent le plan comptable US, les journaux, factures et l'assistant,
   puis un compte API dédié avec droits contacts/comptabilité et lecture seule
   des métadonnées. L'absence du groupe système est vérifiée ; un second
   utilisateur interne ne reçoit pas les droits comptables ;
5. créent les clés temporaires, génèrent les classes via la CLI JSON-2 et
   exécutent PHPUnit avec `--fail-on-skipped` ;
6. révoquent les clés et vérifient leur refus HTTP 401 dans le bloc `finally`,
   puis détruisent conteneurs, réseaux, volumes et fichiers temporaires.

En cas d'échec avant récupération des clés, la destruction de la base élimine
également les credentials éventuellement créés ; le runner tente aussi leur
révocation après un provisionnement partiel. Les images restent en cache.
Les sorties brutes des processus ne sont pas publiées : seuls codes de sortie,
compteurs de tests et emplacements des erreurs sont affichés.

La suppression sélective d’enregistrements reste limitée à ceux portant
`ODOO_JSON2_RUN_ID`. La destruction de l’instance jetable est la stratégie de
nettoyage principale. La suite ne doit fournir aucune opération générale de
création, duplication, suppression ou restauration de base.

Les IDs d'action, de société et de journaux deviennent obligatoires dans un job
prétendant valider la matrice complète avec `--fail-on-skipped`. Le provisionneur
crée une facture brouillon dont la référence exacte est
`json2-action-post:<run-id>` et une facture postée impayée dont la référence est
`json2-payment:<run-id>`, ainsi que l'assistant approprié. Les tests vérifient
ces références et relations avant mutation ; aucune fixture n'est recherchée
par heuristique dans une base inconnue.
Les lignes de l'assistant sont lues et doivent appartenir à la facture de la
fixture avant `action_create_payments` ; société, journal et montant seuls
ne suffisent pas à prouver cette association.

## Scénarios branchés

| Groupe | Preuve attendue |
| --- | --- |
| Version réelle | Lecture de la version installée du module `base` et exigence du préfixe `19.`. |
| Natif lecture | `search`, `search_count`, `search_read`, `read`, `fields_get`, `default_get` et retransmission du contexte utilisateur disponible. |
| Natif écriture | Création unitaire `[id]`, `write`, relecture et `unlink` d’un partenaire marqué par le run ID. |
| Actions | Préconditions run/société/journaux, résultat et état `posted` après `action_post` ; assistant, résultat, état de facture et paiements liés après `action_create_payments`. |
| Façade | UID, champs, recherche, `default_get`, enveloppe synthétique locale distincte de la réponse native et types historiques de create/write/unlink. |
| Compléments serveur | Clé invalide (401), droits comptables refusés (403), création multiple, signatures positionnelles et `load=null`, comparaison de lecture RPC/JSON-2 sur les mêmes IDs. |
| Extensions/contexte | Méthode personnalisée native et signature exacte dans la façade ; conservation de `lang` et `allowed_company_ids`. |
| Génération/managers | Chargement des classes produites par la CLI ; persist/find/update/delete, dates, datetime, many2one et many2many. |
| Révocation | Les deux anciennes clés sont refusées en HTTP 401 après révocation, avant destruction du serveur. |

Les assertions natives portent sur la valeur JSON-2 directe et la réponse HTTP
native. Les assertions de façade portent séparément sur la réponse synthétique
JSON-RPC locale d’identifiant `json2-compat`. Cette enveloppe ne doit jamais être
observée dans une requête réseau.

Chaque écriture de cette suite correspond à un appel explicite. L'absence de
retry, de fallback RPC et de décomposition de `search_read` est prouvée par les
tests unitaires de transport avec client PSR-18 compteur. Le garde dédié prouve
également qu'une panne après émission ne provoque qu'un envoi métier et
n'autorise jamais le rejeu automatique.

Cette couverture ne valide pas toutes les règles multi-sociétés, les langues
traduites, les modules métier externes, les proxys TLS ou les montées de charge.
Le runner n'effectue pas de double écriture RPC/JSON-2 : la comparaison RPC est
une lecture explicite du test, pas un fallback de la bibliothèque.

## Commandes

Validation locale de la préparation, sans serveur ni secret :

```bash
vendor/bin/phpunit -c phpunit.json2-integration.xml
```

Le résultat attendu sans variables contient les tests unitaires de garde réussis
et tous les tests réseau explicitement ignorés. Il ne constitue pas une preuve
d’intégration.

Avec toutes les fixtures et variables provisionnées, la suite stricte utilise :

```bash
vendor/bin/phpunit -c phpunit.json2-integration.xml --fail-on-skipped
```

Le job ne peut être déclaré vert que si aucun scénario essentiel n’est ignoré,
si la version réellement interrogée est Odoo 19 et si le rapport identifie les
images/révisions, modules, version PHP et suites exécutées. La matrice RPC
Odoo 17/18/19 reste inchangée ; les entrées Odoo 19 exécutent également JSON-2.

## GitHub Actions

Le job `tests` existant de `.github/workflows/build.yml` conserve sa matrice :
Odoo 17/18/19, PHP 8.1 à 8.4, Symfony 6.4/7.4, avec l'exclusion existante de
PHP 8.1/Symfony 7.4. Aucun nouveau job, serveur Odoo ou PostgreSQL n'est ajouté.
Composer, ECS et la suite habituelle ne sont pas exécutés en double.

Pour Odoo 19 uniquement, le module de fixtures est monté en lecture seule dès
le démarrage. Après les tests habituels, l'étape JSON-2 lance les 15 tests Python
puis le runner en mode partagé :

<augment_code_snippet mode="EXCERPT">
````sh
python3 .github/json2/run.py --allow-writes --container odoo
````
</augment_code_snippet>

Ce mode exige le label `org.odoo-api-client.ci=true`, un port loopback et Odoo 19.
Il refuse une base `json2_test_ci` préexistante, puis la crée dans **le même
PostgreSQL**, sans serveur HTTP supplémentaire. Elle reste séparée de
`odoo-master` pour préserver les données, la localisation et les credentials
RPC. Le filtre du serveur Odoo 19 autorise explicitement ces deux bases.
La connexion PostgreSQL est reprise à l'intérieur du conteneur via un fichier
de configuration `0600`, sans afficher ni repasser son mot de passe dans argv.

Le runner révoque ses clés dans `finally` et ne supprime jamais le serveur
partagé. L'étape finale `Remove Odoo instance`, avec `always()`, reste responsable
du conteneur ; GitHub gère le service PostgreSQL éphémère. Le mode Compose reste
disponible pour les tests locaux, mais n'est pas utilisé par la CI.
L'exécution locale sous PHP 8.5 ne remplace pas la première matrice GitHub.
