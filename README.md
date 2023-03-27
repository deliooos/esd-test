# esd-test
Projet d'entrée à l'ESD Toulouse.

## Lancement du projet

#### Pré-requis
Par défaut, le projet utilise une base de données Postgres, si vous voulez utiliser une base de données différente, changez la dans le fichier `.env` à la racine du projet. N'oubliez pas de commenter toutes les lignes de connexions que vous n'utilisez pas.
Vous devez ensuite exécuter le fichier `index.php` situé dans le dossier `public`.

### Avec la [CLI Symfony](https://tailwindcss.com/docs/typography-plugin) et Docker
À la racine du projet, lancez les commandes suivantes :
- `composer install`
- `npm install`
- `symfony console doctrine:database:create`
- `symfony console doctrine:migrations:migrate`
- `symfony server:start -d`
- `docker compose up`
- `npm run dev-server`

### Sans la CLI Symfony
- Créez la base de données, par défaut, une base de données Postgres, avec comme identifiant app, mot de passe !ChangeMe! et base donnée app. Vous pouvez changer ces identifiants dans le fichier `.env`
- Exécutez le fichier `index.php`, situé dans le dossier `public`.
À la racine du projet :
- Créez la base de données si ce n'est pas déjà fait avec `php bin/console doctrine:database:create`
- Lancez les migrations avec `php bin/console doctrine:migrations:migrate`
- `composer install`
- `npm install`
- `npm run dev-server`

### Processus de création

#### Technologies utilisés
- Symfony
- TailwindCSS

#### Pourquoi Symfony
Symfony est un framework php avec lequel je suis à l'aise. L'utilité de celui-ci dans un projet si petit est discutable mais comme c'est un projet pour montrer ses compétences, autant montrer ses compétences. Egalement, compte tenu du délai de réalisation du projet, ça fait sens pour les fonctionnalités demandés.

#### Pourquoi Tailwind
Commme pour Symfony, c'est un framework CSS avec lequel je suis à l'aise. Il fait bien son travail, il est facile à installer et bien intégré à Symfony, donc j'ai choisi de l'utiliser.

#### Prises de décisions
J'ai choisi de créer 5 pages.

- Les CGU, requis dans le sujet, comporte un lorem ispum, stylisé par [Tailwind Typography](https://tailwindcss.com/docs/typography-plugin) ainsi que le logo du CES.
- La page d'accueil. Décrivant le but du site, comment participer et comment se déroule la participation, les prix à gagner et deux liens, un pour participer et un pour accéder aux CGU

#### Et 3 pages pour le quiz en lui-même :
1. L'index : il comporte les questions du quiz. Le quiz est construit grâce au [Form Builder](https://symfony.com/doc/current/forms.html) de Symfony. J'ai choisi de ne pas implémenter de "sections" ou "tabs" en Javascript pour éviter toute confusion quant à la validation du formulaire. Les questions sont donc les unes en dessous des autres. À la soumission du formulaire, l'utilisateur est envoyé sur la page "validate", avec les résultats de son formulaire en GET.
2. Validate : il comporte la validation de la participation. Comme dit à au-dessus, il requiert les informations du quiz, s'il ne les trouve pas dans le GET, il renvoie au quiz. Si il trouve les informations du quiz, il affiche un formulaire invitant l'utilisateur à renseigner des informations sur lui. Il y a un bouton valider. Au clic de ce bouton, les informations de l'utilisateur sont persistés en base de données. Il consulte également les résultats du quiz. Si les résultats sont justes, il inscrit l'utilisateur au concourt.
3. Results : il comporte les résultats du quiz. Il affiche un texte remerciant l'utilisateur pour avoir participé au concours. Comme ce n'était pas précisé dans l'énoncé, j'ai fais le choix de ne pas dire à l'utilisateur s'il avait réussi le quiz ou non. D'ici, l'utilisateur est notifié qu'il recevra les résultats par mail et est invité à retourner sur la page d'accueil.

#### Résultats du concours
Il est possible de retrouver les participants choisis par le système dans la console, sur la page d'accueil.
