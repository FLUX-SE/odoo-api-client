# Plan de suivi délégable après revue JSON-2

## Objectif et consignes communes

Corriger les écarts du [rapport de revue](json2-review.md), puis apporter les preuves manquantes. Ne pas recommencer la migration, remplacer les transports historiques, changer leurs contrats ou réécrire les tests de référence pour faire disparaître un échec.

Travailler sur `json-2-api`. Les livrables précédents sont partiellement indexés et non commités : conserver l'index et les modifications existantes ; ne pas faire de reset, checkout destructif, commit, push ou publication sans instruction. Avant délégation concurrente, l'intégrateur doit fournir à tous les agents le même état de départ, comprenant les fichiers non commités.

Chaque agent doit **vérifier son propre travail et remettre un retour** : reproduire avant correction, ajouter le test de non-régression attendu, corriger minimalement, exécuter le test puis la suite concernée, inspecter son diff. Un code de sortie 0 avec des tests essentiels ignorés n'est pas une validation d'intégration.

Ne pas utiliser de données métier ni de credential réel dans les tests unitaires, commandes, logs ou rapports. Ne pas toucher aux dépendances sans autorisation. Aucun test écrivant dans Odoo avant confirmation d'un environnement jetable autorisé.

## Ordre et ownership

| Lot correctif | Mission | Dépendances | Fichiers possédés |
| --- | --- | --- | --- |
| K1 | Isolation du builder, R1 | Aucune | Builder JSON-2, façade si nécessaire, tests de composition associés |
| K2 | Signatures ORM, R2 | Aucune | Registre/mappers et tests de mapping |
| K3 | Gardes et assertions d'intégration, R4 | Aucune pour les tests locaux | `tests/Integration/Json2/**` et tests de garde |
| K4 | Provisionnement, intégration réelle et CI, R3 | Préparation possible immédiatement ; exécution après K1–K3 et autorisation | Nouveau workflow/provisionnement ; configuration de suite et documentation d'intégration |
| K5 | Alignement documentaire et revue finale, R5 | Alignement après K1 ; clôture après K2–K4 | Architecture, guide, README, rapport final |

**K1, K2 et K3 peuvent démarrer en parallèle.** K4 ne modifie pas les tests appartenant à K3 tant que K3 n'est pas intégré. K5 ne modifie pas les commentaires de façade simultanément avec K1 : transmettre ce petit changement à K1 ou attendre sa fusion. L'intégrateur est responsable des fichiers partagés et des conflits, pas chaque agent indépendamment.

## K1 — Corriger la synchronisation d'une ancienne façade

**Mission à transmettre :** « Reproduis R1, empêche une façade détachée de réécrire la connexion active, et prouve que les setters de la façade courante restent synchronisés avec le builder. »

### Travaux et tests requis

1. Ajouter un test conservant F1, provoquant un reset du graphe, obtenant F2, puis modifiant la base de F1. Le test doit constater avant correction la divergence entre F2 et le client natif reconstruit.
2. Définir la frontière d'appartenance du callback : seule la façade de la génération active peut réécrire la configuration du builder. Une solution par génération/token ou validation d'appartenance est possible ; éviter une simple invalidation de cache qui laisserait l'ancien callback actif.
3. Les objets détachés peuvent conserver leur propre configuration, mais ne doivent contaminer ni la façade courante, ni les constructions futures, ni une rotation de clé plus récente.
4. Couvrir hôte, base, clé et login-libellé, resets par serializer/registre/client HTTP, ainsi que l'absence de dernière réponse/UID obsolète lorsque la connexion active change.
5. Vérifier que les accesseurs exposent un état cohérent, y compris le request maker et le client natif après reconfiguration. Ne pas changer les caches historiques RPC.
6. Aligner le commentaire de `username` sur « libellé non vérifié », sans ajouter d'appel réseau d'identité implicite.

**Exécution :** test ajouté seul, puis `tests/Builder/Json2` et `tests/Operations/Json2/Json2ObjectOperationsTest.php`, avec `--no-configuration --bootstrap vendor/autoload.php --do-not-cache-result`.

**Acceptation :** reproduction avant correction, tests après correction verts ; aucune divergence de base/clé provoquée par un ancien objet ; la synchronisation d'une façade active et l'isolation de deux builders continuent de fonctionner.

## K2 — Compléter les signatures ORM sans traduction permissive

**Mission à transmettre :** « Corrige R2 pour les signatures Odoo 19 connues, en préservant options, collisions et surcharges de modèle. »

### Travaux et tests requis

1. Fixer la révision serveur utilisée comme référence et vérifier les noms/positions des paramètres ; la provenance actuelle « Odoo 19.0 » seule n'identifie pas un commit.
2. Couvrir les positionnels de `search` : `domain`, `offset`, `limit`, `order` ; de `search_count` : `domain`, `limit` ; et de `search_read` : `domain`, `fields`, `offset`, `limit`, `order`.
3. Accepter notamment `load` dans `search_read` selon la signature de lecture Odoo 19. Conserver `load=null` ; définir explicitement la politique des autres mots-clés de lecture et des surcharges, sans autoriser aveuglément tout paramètre.
4. Ajouter les trois reproductions R2 et un test via le wrapper réel `SearchReadOptions::addOption('load', null)`. Vérifier le corps JSON transmis à un faux client, pas seulement l'objet intermédiaire.
5. Tester collisions positionnels/mots-clés, nombre excessif de positionnels, `false`/zéro/`null`, options inconnues et priorité à la signature exacte modèle/méthode.
6. Ne pas modifier la sémantique unitaire/multiple de `create`, les commandes relationnelles ni les signatures des interfaces historiques.

**Exécution :** tests ciblés puis `tests/Operations/Json2/Mapping` ; rejouer les tests locaux des wrappers et managers concernés.

**Acceptation :** les appels valides R2 sont correctement nommés et transmis ; les ambiguïtés et appels réellement non pris en charge restent rejetés avant HTTP. Aucun filtrage silencieux des options.

## K3 — Renforcer les préconditions et les assertions d'intégration

**Mission à transmettre :** « Corrige R4 sans interroger une instance réelle : rends les contrôles obligatoires testables avec des doubles et renforce les scénarios qui seront exécutés par K4. »

### Travaux et tests requis

1. Garder les deux opt-ins, la confirmation stricte de base et le préfixe jetable. Ne jamais lire un fichier de credentials local dans un test unitaire.
2. Ajouter un précontrôle serveur en lecture seule, obligatoire avant les écritures, qui vérifie la version réellement ciblée. Il doit fonctionner quand PHPUnit sélectionne uniquement les tests d'action/écriture, sans dépendre d'un autre test.
3. Rendre ce précontrôle testable sans réseau : version incorrecte, réponse invalide, erreur HTTP ou refus de droits doivent empêcher tout appel d'écriture. Ne pas considérer la variable de version déclarée comme une preuve serveur.
4. Définir avec le provisionneur K4 des fixtures d'action propres au run : facture brouillon, société/journal attendus et assistant de paiement approprié. Contrôler ces préconditions avant mutation.
5. Après `action_post`, vérifier le résultat attendu pour la version et l'état effectif de la facture. Après `action_create_payments`, vérifier la forme du résultat et les paiements liés créés/états attendus. Une dernière réponse non nulle ne suffit pas.
6. Ajouter un test de garde contre la mauvaise identité de fixture/run, et préciser le comportement lorsqu'une action a été validée mais que sa réponse a été perdue : pas de rejeu automatique.

**Exécution :** tests de garde purs et doubles seulement. Une commande sur toute la suite dédiée doit retirer explicitement les variables Odoo de l'environnement enfant si l'objectif est une validation hors réseau.

**Acceptation :** les tests locaux prouvent qu'aucune écriture n'est envoyée avant les préconditions ; les scénarios réseau restent ignorés explicitement sans autorisation ; les assertions métier ne sont pas remplacées par des assertions de transport.

## K4 — Terminer le lot d'intégration, pas seulement sa préparation

**Mission à transmettre :** « Prépare et, une fois autorisé, exécute une validation reproductible sur Odoo 19 jetable, puis branche une vraie CI JSON-2. Ne transforme pas une absence d'environnement en succès. »

### Prérequis nécessitant une décision concrète

Confirmer la cible jetable autorisée et le mécanisme de provisionnement, l'édition/modules disponibles, ainsi que le canal sécurisé pour une clé éphémère. Si cela manque, remettre un rapport « bloqué » demandant précisément cette autorisation/information. Ne pas inventer de credentials, installer un module serveur supplémentaire ou utiliser une base métier à la place.

### Travaux et tests requis

1. Identifier image/digest ou révision Odoo, PostgreSQL, modules et versions PHP/Symfony ; choisir les combinaisons compatibles avec les contraintes existantes.
2. Provisionner base et fixtures dédiées, utilisateur API et clé éphémère ; transmettre la clé hors argv/logs et prévoir nettoyage/révocation indépendamment du résultat du job. Éviter une dépendance Enterprise non nécessaire ou non autorisée.
3. Exécuter la suite après K1–K3 sans skips essentiels. Compléter les preuves manquantes : droits refusés, mauvaise clé, méthode personnalisée, contexte langue/société, dates/relations, création multiple et comparaison des résultats RPC/JSON-2 sur données contrôlées.
4. Tester réellement la chaîne de génération CLI dans un répertoire temporaire neuf : inspecter/charger les classes produites et les utiliser avec les managers. Ne pas remplacer des modèles existants dans le dépôt pour simplifier le test.
5. Conserver les jobs historiques Odoo 17/18/19. Ajouter le workflow JSON-2 Odoo 19 ; éviter un job vert qui ne ferait que skipper les tests. Distinguer les anomalies historiques XML-RPC connues d'une régression introduite.
6. Publier les résultats exacts : code de sortie de chaque étape, tests réussis/ignorés, révisions, modules, preuve de garde et nettoyage. Ne pas joindre de dumps HTTP, base ou environnement sensibles.

**Acceptation :** intégration JSON-2 et génération réellement exécutées, assertions métier satisfaites, CI reproductible, aucune dépendance non autorisée, aucun test essentiel ignoré. Sans environnement, K4 reste explicitement non accepté et la livraison n'est pas présentée comme prête pour production.

## K5 — Aligner les documents et faire la revue de clôture

**Mission à transmettre :** « Corrige R5 puis fais une revue indépendante des lots correctifs et de leurs preuves ; ne te contente pas de leurs déclarations. »

- Décrire partout le login comme libellé de compatibilité non vérifié ; renommer l'exemple `loginAssertion` en conséquence. L'identité est portée par la clé. Ne pas ajouter une prétendue garantie d'identité sans implémentation.
- Documenter la durée de vie des graphes du builder et la politique des objets détachés après K1, puis la matrice de positionnels/options réellement couverte après K2.
- Mettre à jour les statuts d'intégration seulement après réception des preuves K4. Garder clairement visible toute limitation ou validation différée.
- Rejouer la suite locale de 211 tests de référence, les nouveaux tests, le style, PHPStan versionné, validation Composer et diff de signatures contre la fixture d'origine. Les nombres augmenteront avec les tests correctifs.
- Utiliser `vendor/bin/phpstan analyse -c phpstan.neon.dist --no-progress` pour une preuve reproductible. Rapporter séparément les deux exclusions obsolètes de la configuration locale ; ne pas les résoudre par une modification métier ou un affaiblissement global de l'analyse.
- Rapporter la dépréciation de la dépendance XML-RPC sous PHP 8.5 sans changer sa version sans permission.
- Vérifier les exemples CLI, les messages de sécurité et l'absence de changement de dépendance ou de contrat historique non autorisé. Ne pas mettre à jour la fixture de référence pour masquer une rupture.

**Acceptation :** R1/R2 corrigés et reproductions devenues tests verts, R4 vérifié, R5 cohérent ; R3 accepté uniquement avec preuves réelles, sinon décision explicite de ne livrer qu'une version expérimentale/non validée. Publication toujours réservée au mainteneur.

## Format obligatoire du retour de chaque agent

1. **Lot et état** : terminé localement, validé en intégration ou bloqué ; ne pas fusionner ces notions.
2. **Écart reproduit** : référence R1–R5, résultat avant correction et test ajouté.
3. **Modification** : fichiers précis, décision prise et incidence sur les contrats.
4. **Vérification** : commandes exécutées, codes de sortie, compteurs de tests/assertions/skips et warnings.
5. **Limites** : ce qui n'a pas été exécuté, dépendances externes manquantes et risque résiduel.
6. **Retour à l'intégrateur** : prochain lot débloqué, conflit potentiel ou question d'autorisation ciblée.

L'intégrateur consolide ces retours dans un rapport final unique et vérifie le diff complet, sans écraser les modifications d'un autre agent. Le nombre de lots déclarés terminés ne remplace pas les preuves d'exécution.
