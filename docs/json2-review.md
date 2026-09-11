# Revue de clôture du suivi JSON-2

## Verdict

**La validation Docker Odoo 19 est réussie, sans skip. Le provisionneur et le
branchement JSON-2 dans le job existant sont livrés ; la première exécution distante reste à confirmer.
Le chemin reste expérimental, sans certification générale de production.**

Revue directe du 11 septembre 2026 sur l'état de travail non commit du dépôt,
comparé à `2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2`. Les modifications restent
réparties entre l'index et l'arbre de travail. Aucun reset, commit ou push n'a
été effectué. Les appels, écritures comptables et clés réelles concernent
uniquement le projet Docker jetable créé pour cette revue, jamais une base
existante. Les clés ont été révoquées et les conteneurs détruits.

Les 230 tests / 810 assertions annoncés initialement ont d'abord été reproduits.
La revue supplémentaire a ensuite ajouté des régressions pour le transport
détaché, la cible du garde d'écriture et les lignes de l'assistant de paiement.
Le [guide d'intégration](json2-integration-testing.md) fournit la commande
reproductible, les protections et les limites du scénario serveur.

## Résolution des constats

### R1 — Corrigé localement : isolation des générations du builder

`Json2ApiClientBuilder` associe désormais chaque façade à la génération du
graphe qui l'a créée. Un reset incrémente cette génération. Le callback d'une
façade détachée peut encore mettre à jour son propre objet, mais il est ignoré
par le builder et ne peut plus réécrire hôte, base, clé ou libellé actifs.

Les tests couvrent la reproduction originale, la synchronisation de la façade
courante, la rotation de clé, les changements d'hôte/base/libellé, les resets
par dépendances, deux builders isolés et l'absence de UID/dernière réponse
obsolète après reconstruction.
Un cas supplémentaire a été reproduit : après `setHttpClient`, reconfigurer
une ancienne façade lui attribuait le nouveau client HTTP malgré sa génération
détachée. Sa factory capture maintenant les dépendances PSR et le codec de son
propre graphe. Le test échouait avant correction et passe après.

### R2 — Corrigé localement : signatures ORM bornées et versionnées

La provenance est fixée à
`odoo/odoo@cd992ceebbaf343c03e1941d39cfe423d35ba6c6`. Les positionnels couverts
sont :

- `search(domain, offset, limit, order)` ;
- `search_count(domain, limit)` ;
- `search_read(domain, fields, offset, limit, order)`.

`search_read` accepte explicitement `load`, y compris `null`. Le mapper conserve
les valeurs falsy, refuse collisions, positionnels en excès et options inconnues,
et donne toujours priorité à la signature exacte modèle/méthode. Le wrapper
`SearchReadOptions` est testé jusqu'au corps HTTP JSON ; aucune ouverture
générale de mots-clés n'a été ajoutée.
Ces signatures, ainsi que `load=null`, ont aussi été exercées sur le serveur
Docker. La référence source du registre reste distincte du digest de l'image
effectivement exécutée ci-dessous.

### R3 — Serveur vérifié localement ; exécution GitHub encore à confirmer

Le runner `.github/json2/run.py --allow-writes` démarre PostgreSQL et Odoo 19
Community dans un projet isolé, installe les fixtures et lance la suite stricte.
Images figées dans `.github/json2/compose.yaml`, avec manifestes amd64 et arm64
vérifiés :

- Odoo : `sha256:a627eda6b4154eead21c4fca55f84f1671d870ca111aa57f93ca305861bc4613` ;
- PostgreSQL : `sha256:f1c3376c26f2609ab9f29f71f824103fe2fcd8ee0346485cb6122a4f93df6f94`.

Le module de test dépend de `l10n_us_account`, donc de `account` et `l10n_us`.
Le compte API n'appartient pas au groupe système ; il reçoit les droits
contacts/comptabilité et la lecture des métadonnées nécessaires. Un second
compte interne sans accès comptable obtient bien un HTTP 403.

La suite vérifie CRUD unitaire/multiple, actions comptables et effets serveur,
méthodes personnalisées, contexte, comparaison de lectures RPC/JSON-2,
génération CLI et managers sur les classes produites (dates et relations).
Les deux clés expirent après une heure, sont transmises hors argv dans un
environnement de processus protégé, puis révoquées. Leur refus HTTP 401 a été
vérifié avant destruction du serveur, y compris lors d'exécutions en échec.

Le job supplémentaire a été supprimé à la demande de simplification. Le job
`tests` de `.github/workflows/build.yml` conserve sa matrice PHP/Symfony/Odoo.
Seules les entrées Odoo 19 ajoutent l'étape JSON-2, après la suite habituelle.
Elles réutilisent le serveur et PostgreSQL déjà démarrés ; la base dédiée
`json2_test_ci` protège les fixtures et credentials RPC de `odoo-master`.
Le montage du module doit précéder le démarrage : Odoo ignore un chemin
d'addons vide au démarrage, même si le module y est copié ultérieurement.

Le runner exige `--fail-on-skipped`, révoque ses clés dans `finally` et laisse
le serveur partagé vivant. Le nettoyage final existant reçoit `always()`.
La séquence RPC puis JSON-2 et le contrôle RPC après révocation ont été validés
localement sur le même ID de conteneur. **La matrice n'a pas été exécutée sur GitHub pendant cette
session** : aucune branche n'a été poussée ni aucun workflow déclenché.

### R4 — Corrigé localement : garde obligatoire avant mutation

Tout client construit par `Json2IntegrationEnvironment` est enveloppé par une
frontière PSR-18 de test. Sans opt-in global, second opt-in d'écriture,
confirmation exacte de base jetable et run sûr, une mutation est refusée avant
réseau. Avant la première écriture ou action, une lecture authentifiée de
`ir.module.module/search_read` exige une version de `base` commençant par
`19.`. Cette vérification appartient au client et reste donc active quel que
soit l'ordre ou le filtre PHPUnit.

Les doubles prouvent qu'une version incorrecte, un JSON ou une forme invalide,
un statut 403/refus de droits et une action isolée empêchent l'appel métier.
Toute méthode inconnue est considérée mutante. Une perte de réponse après envoi
ne provoque aucun rejeu automatique.
La revue a reproduit deux contournements supplémentaires : le cache de
précontrôle survivait à un changement de cible, et un builder autorisé pouvait
être reconfiguré vers une autre base. Le cache est désormais lié à l'URL, la
base et la clé ; les écritures du harnais doivent en outre viser exactement
l'hôte/préfixe et la base autorisés initialement. Les régressions prouvent
respectivement le nouveau précontrôle et le refus avant tout appel réseau.

Les fixtures d'action sont identifiées par les références exactes
`json2-action-post:<run-id>` et `json2-payment:<run-id>`, ainsi que par leurs
société et journaux. Les scénarios vérifient les états avant mutation, le retour
Odoo 19 attendu et l'état `posted` après `action_post`. Pour le paiement, ils
vérifient l'assistant, son montant, son contexte actif, la forme du résultat,
l'état de facture et les paiements liés créés. Une mauvaise référence de run
est rejetée avant mutation.
Le contrôle initial de l'assistant était insuffisant si une autre facture
partageait société, journal et montant. Le test de régression reproduit ce
cas ; les lignes de l'assistant sont maintenant lues et leur `move_id` doit
correspondre à la facture provisionnée avant l'action. Les paiements liés
doivent être en état `in_process` ou `paid`, pas simplement différents de
`draft`.

### R5 — Corrigé : login décrit comme libellé non vérifié

Dans le chemin JSON-2, le paramètre historique `username` est seulement un
libellé facultatif de compatibilité. Il est stocké localement, non vérifié et
jamais envoyé à Odoo. Il ne sélectionne pas l'utilisateur et ne fournit aucune
preuve d'identité ; l'identité effective est celle de la clé API. Les exemples
utilisent désormais `$compatibilityLabel`. Une véritable assertion d'identité
serait un contrat séparé, non implémenté ici.

## Vérifications de clôture

Environnement local : PHP 8.5.10, PHPUnit 10.5.63, Docker sur arm64.
Les tests unitaires restent sans réseau ; la ligne Docker utilise exclusivement
les clés et données temporaires provisionnées par le runner.

| Vérification | Code | Résultat |
| --- | ---: | --- |
| Suite JSON-2 locale complète, hors intégration réseau | 0 | 231 tests, 813 assertions, 1 dépréciation |
| Suite locale et gardes K3 réunis | 0 | 261 tests, 879 assertions, 1 dépréciation |
| Configuration JSON-2 dédiée, variables Odoo retirées | 0 | 46 tests, 66 assertions, 16 skips réseau explicites |
| Runner Docker : génération CLI + suite stricte + révocation + nettoyage | 0 | 46 tests, 181 assertions, 0 skip (30 tests de garde, 16 scénarios réseau) ; deux clés refusées en HTTP 401 |
| Serveur partagé : suite habituelle (RPC et tests locaux) | 0 | 281 tests, 959 assertions, 0 skip |
| Même serveur : suite JSON-2 puis contrôle RPC après révocation | 0 | 46 tests / 181 assertions puis 4 / 4 ; aucun skip, conteneur inchangé |
| Tests Python du cycle de vie, du mode partagé et des sorties sûres | 0 | 15 tests |
| YAML workflow/Compose, matrice et syntaxe des scripts shell | 0 | validation réussie ; `docker compose config --quiet` également vert |
| Fixture de signatures publiques historiques | 0 | 1 test, 198 assertions |
| `phpstan.neon.dist` sur le projet | 0 | aucune erreur |
| Configuration PHPStan locale automatique | 1 | uniquement 2 règles `ignoreErrors` obsolètes/non appariées dans `OdooNormalizer` |
| ECS sur `src` et `tests` | 0 | aucune erreur |
| `composer validate --strict --no-interaction` | 0 | manifeste valide |
| Syntaxe du binaire générateur | 0 | aucune erreur |
| Aide CLI RPC puis `--api=json2`, variables de credentials retirées | 0 / 0 | RPC reste le défaut ; JSON-2 reste explicite ; aucune clé requise ou affichée |
| `git diff --check` | 0 | aucun problème d'espacement |
| État de `composer.json`, `composer.lock`, `symfony.lock` | 0 | aucun changement |

Commande de la suite locale :

```bash
vendor/bin/phpunit --no-configuration --bootstrap vendor/autoload.php \
  --do-not-cache-result \
  tests/Api/Json2 tests/Builder/Json2 tests/Command/Json2 \
  tests/Compatibility/Json2Migration tests/Operations/Json2 \
  tests/Serializer/Json2 tests/Operations/Object/ExecuteKw/Arguments
```

La dépréciation unique provient de
`vendor/phpxmlrpc/polyfill-xmlrpc/src/XmlRpc.php:313` sous PHP 8.5. Elle est
extérieure au changement JSON-2 et aucune dépendance n'a été modifiée pour la
masquer.

Le shim `vendor/bin/odoo-model-classes-generator` n'existe pas dans ce checkout
source. Le runner utilise donc `php bin/odoo-model-classes-generator` pour la
génération réelle, puis charge ses classes dans le test des managers. Les
fichiers générés, rapports bruts et credentials restent dans le répertoire
temporaire privé et ne sont pas publiés comme artefacts.

## État des lots de suivi

| Lot | État vérifié | Suite |
| --- | --- | --- |
| K1 — Isolation | Terminé, transport détaché inclus | Conserver les régressions |
| K2 — Signatures | Tests locaux et serveur verts | Revalider si la révision Odoo change |
| K3 — Gardes/actions | Gardes et effets serveur vérifiés | Conserver les fixtures strictes |
| K4 — Serveur/CI | Docker autonome et serveur partagé verts, étape CI livrée | Confirmer la matrice GitHub existante après publication |
| K5 — Documentation/revue | Mise à jour | Conserver la distinction local/CI/production |

## Limites et décision de livraison

Cette revue n'est ni une certification de sécurité, ni un test de charge, ni
une validation de tous les droits multi-sociétés, traductions, proxys TLS ou
modules métier tiers. Les 16 skips hors environnement restent attendus ; ils
ne sont pas confondus avec l'exécution Docker sans aucun skip.

La livraison peut être décrite comme une implémentation JSON-2 expérimentale,
opt-in, testée réellement sur Odoo 19 Community. Restent à confirmer la matrice
GitHub (dont les jobs RPC historiques) et les validations propres à chaque
déploiement. Aucune dépendance PHP, aucun lockfile ni fixture de signatures
publiques historiques n'a été changé par cette nouvelle revue. La configuration
PHPStan locale ignorée conserve ses deux exclusions obsolètes ; la configuration
versionnée est verte. Aucun conteneur de test ne reste lancé, seules les images
Docker sont conservées en cache.
