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