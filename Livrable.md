# Tutoriel 3.2.3 — Protéger l’espace d’administration avec le middleware `auth`

## Qu’est-ce qu’un middleware ?

Un **middleware** dans Laravel est un “gardien” qui intercepte une requête **avant** qu’elle n’atteigne une route ou un contrôleur.
Il peut décider de laisser passer, rediriger ou bloquer l’accès.

## Le rôle du middleware `auth`

Le middleware **auth** vérifie si un utilisateur est connecté :

* **Utilisateur connecté** → accès autorisé
* **Non connecté** → redirection automatique vers `/login`

## Où j’ai ajouté la protection ?

Dans le fichier **`routes/web.php`**, j’ai protégé la route `/admin` en ajoutant :

```php
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');
```

##  Résultat

* Si je vais sur **/admin** sans être connecté → je suis redirigé vers **/login**.
* Si je suis connecté → la page **admin/dashboard.blade.php** s’affiche correctement.

---

