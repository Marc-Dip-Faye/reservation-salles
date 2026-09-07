1. Quel est le rôle de Composer ?
=>Composer est le gestionnaire de dépendances pour PHP. Son rôle est de télécharger, installer et gérer les librairies externes dont ton projet a besoin (routeur, ORM, validation, etc.), sans que tu aies à le faire manuellement.

2. Quelle différence existe entre require et require-dev ?
require : dépendances nécessaires au fonctionnement de l'application en production. Exemple : ton routeur (nikic/fast-route), ton ORM (illuminate/database) — sans eux, l'app ne tourne pas.
require-dev : dépendances utiles uniquement pendant le développement, jamais en production. Exemple : PHPUnit (tests), un outil de debug, un linter de code (PHP_CodeSniffer, PHPStan).

3. Pourquoi faut-il versionner composer.lock ?
Ce fichier note exactement quelle version de chaque librairie tu as installée.
Sans lui, si toi et ton collègue installez le projet à deux moments différents, vous pourriez avoir des versions différentes des mêmes librairies → et donc des bugs différents chez chacun de vous, sans comprendre pourquoi.

4. Pourquoi ne pas versionner vendor/
Parce que :
c'est très lourd (beaucoup de fichiers)
ce n'est pas nécessaire, car n'importe qui peut le régénérer en une commande (composer install) à partir de composer.json et composer.lock



ETAPE 2
1. Quel rôle joue Capsule\Manager ?
→ Il sert à configurer et démarrer Eloquent avec la base de données.
2. Pourquoi Eloquent peut-il fonctionner sans Laravel ?
→ Parce qu’Eloquent est un ORM indépendant. Il peut être installé et utilisé séparément de Laravel.
3. Où doit se trouver le démarrage de l’ORM ?
→ Dans un fichier de configuration/démarrage, généralement dans bootstrap ou config.
4. Quelle différence existe entre ORM et SQL écrit à la main ?
→ ORM : on manipule la base avec des objets et des méthodes PHP.
→ SQL manuel : on écrit directement les requêtes SQL (SELECT, INSERT, UPDATE, etc.).




ETAPE 3
Quel type de relation Eloquent avez-vous utilisé ?
→ Une relation hasMany ou belongsTo, selon le lien entre les tables.
Pourquoi déclarer $fillable ou $guarded ?
→ Pour protéger les données et contrôler les champs qu’on peut remplir automatiquement.
Pourquoi convertir active en booléen ?
→ Pour avoir une vraie valeur true ou false au lieu de 0 ou 1.
Pourquoi convertir les dates en objets ?
→ Pour pouvoir manipuler facilement les dates avec des méthodes PHP.


ETAPE 4
1. Quelle différence existe entre migration et seeder ?
→ La migration sert à créer ou modifier la structure de la base de données.
→ Le seeder sert à ajouter des données de départ dans la base.
2. Pourquoi les données initiales doivent-elles être reproductibles ?
→ Pour pouvoir recréer les mêmes données facilement après avoir réinitialisé ou recréé la base.
3. Comment empêcher les doublons ?
→ En utilisant une contrainte UNIQUE dans la base de données et en vérifiant aussi les données avant l’insertion.



ETAPE 5
1. Pourquoi séparer la validation syntaxique des règles métier ?
→ Pour séparer les responsabilités et rendre le code plus simple à gérer.
2. Pourquoi créer une interface de validation ?
→ Pour définir les règles que tous les validateurs doivent respecter.
3. Pourquoi le validateur ne doit-il pas enregistrer les données ?
→ Parce que son rôle est seulement de vérifier les données, pas de les enregistrer.
4. Comment retourner plusieurs erreurs en une seule fois ?
→ En mettant toutes les erreurs dans un tableau, puis en retournant ce tableau.