# Glossaire rapide

Petit glossaire des termes courants que tu rencontreras dans un projet Laravel. Définitions courtes et exemples de commandes utiles.

- **`Composer`** — Gestionnaire de dépendances PHP. On l'utilise pour installer Laravel et les bibliothèques du projet.
	- Exemple : `composer install` pour installer les dépendances depuis `composer.lock`.

- **`Artisan`** — Interface en ligne de commande de Laravel (`php artisan ...`). Permet d'exécuter des commandes utiles : créer des contrôleurs, des migrations, lancer le serveur, etc.
	- Exemple : `php artisan make:controller PhotoController` ou `php artisan migrate`.

- **`.env`** — Fichier de configuration d'environnement (BD, clés, URL, etc.). Il permet de stocker des valeurs sensibles hors du code source.
	- Astuce : ne pas commiter le fichier `.env` dans le dépôt public.

- **`Migration`** — Script qui permet de décrire et d'appliquer la structure de la base de données (tables, colonnes, index).
	- Exemples : `php artisan make:migration create_photos_table` puis `php artisan migrate`.

- **Serveur intégré** — Serveur de développement fourni par Laravel pour tester l'application en local.
	- Commande : `php artisan serve` (par défaut accessible sur http://127.0.0.1:8000).

- **`Seeding` (seeders)** — Mécanisme pour remplir la base de données avec des données de test ou initiales.
	- Exemple : `php artisan make:seeder UsersTableSeeder` puis `php artisan db:seed --class=UsersTableSeeder`.

- **`Factories`** — Classes permettant de définir des modèles de données (faker) pour générer des enregistrements de test facilement.
	- Exemple : `php artisan make:factory UserFactory` et utilisation dans les tests ou seeders : `User::factory()->count(10)->create();`.

- **`Eloquent`** — ORM (Object-Relational Mapper) de Laravel. Permet de travailler avec la base de données via des modèles PHP (active record).
	- Exemple : `class User extends Model { /* ... */ }` puis `User::where('active', 1)->get();`.

- **`Middleware`** — Composant qui intercepte les requêtes HTTP avant qu'elles n'atteignent les contrôleurs. Utile pour l'authentification, la vérification d'autorisation, la gestion CORS, etc.
	- Exemple : `php artisan make:middleware EnsureTokenIsValid` puis enregistrer dans `app/Http/Kernel.php` ou l'appliquer à des routes.


- **`MVC`** — architecture logicielle qui sépare la logique (Contrôleur), les données (Modèle) et l’affichage (Vue).
- **`Route`** — relie une URL à une action du contrôleur.
- **`Contrôleur`** — classe qui reçoit la requête, traite la logique et retourne une vue.
- **`Blade`** — moteur de templates intégré à Laravel pour générer les pages HTML.
- **`Layout`** — modèle principal des pages (gabarit).
- **`Partial`** — fragment réutilisable de vue (`@include`).
- **`Route nommée`** — alias permettant d’appeler une route par son nom (`route('home')`).
