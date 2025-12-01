# Livrables — Tutoriel 3.2.1

## Zones principales du blog

| Zone / Page                | URL (exemple)               | Type d’accès souhaité                                              |
| -------------------------- | --------------------------- | ------------------------------------------------------------------ |
| Accueil du blog            | /                           | Public (tout le monde)                                             |
| Liste des articles         | /articles                   | Public (tout le monde)                                             |
| Page d’un article          | /articles/{slug}            | Public (tout le monde)                                             |
| Dashboard d’administration | /admin                      | Réservé aux utilisateurs connectés                                 |
| Création d’article         | /admin/articles/create      | Réservé à certains rôles (Auteur, Admin)                           |
| Édition d’un article       | /admin/articles/{id}/edit   | Réservé à certains rôles (Auteur, Admin)                           |
| Suppression d’article      | /admin/articles/{id}/delete | Réservé à certains rôles (Auteur pour les siens / Admin pour tous) |

---

## Rôles du blog

| Rôle         | Description courte                                                                              |
| ------------ | ----------------------------------------------------------------------------------------------- |
| **Visiteur** | Personne non connectée qui peut lire les articles publics.                                      |
| **Auteur**   | Utilisateur connecté qui peut écrire, modifier et supprimer ses propres articles.               |
| **Admin**    | Utilisateur connecté qui gère tout le blog : accès admin complet, gestion de tous les articles. |

---

## Tableau “Qui a le droit de faire quoi ?”

| Action / Rôle                    | Visiteur | Auteur | Admin                             |
| -------------------------------- | -------- | ------ | --------------------------------- |
| Lire les articles publics        | ✔️       | ✔️     | ✔️                                |
| Accéder au dashboard /admin      | ❌        | ✔️     | ✔️                                |
| Créer un article                 | ❌        | ✔️     | ❌ *(selon consigne fil rouge V6)* |
| Modifier ses propres articles    | ❌        | ✔️     | ✔️                                |
| Modifier n’importe quel article  | ❌        | ❌      | ✔️                                |
| Supprimer ses propres articles   | ❌        | ✔️     | ✔️                                |
| Supprimer n’importe quel article | ❌        | ❌      | ✔️                                |

> ! Ce tableau suit les règles données dans l’autoformation :
> **L’Auteur peut ajouter/éditer/supprimer *uniquement* ses articles.
> L'Admin peut supprimer n’importe quel article mais ne peut pas en ajouter.**

---

## Lien entre les règles métier et les outils Laravel

**Comment Laravel va gérer tout ça ?**

* **Savoir qui est connecté (login/logout)**
  → Géré par **l’authentification Laravel UI** (Tutoriel 3.2.2)

* **Empêcher les non connectés d’accéder à /admin**
  → Géré par le **middleware `auth`** dans les routes (Tutoriel 3.2.3)

* **Différencier Auteur / Admin**
  → Géré par un **champ `is_admin`** + Auth::user() (Tutoriels 3.2.4 & 3.2.5)

* **Autoriser/interdire des actions spécifiques (créer, éditer, supprimer)**
  → Géré par les **Gates** et **Policies** (Tutoriels 3.2.6 → 3.2.8)

En résumé :

* **Authentification = Qui est connecté ?**
* **Autorisation = Que peut-il faire selon son rôle ?**
* **Middleware = contrôler l’accès aux routes**
* **Gates/Policies = contrôler les actions sensibles**


