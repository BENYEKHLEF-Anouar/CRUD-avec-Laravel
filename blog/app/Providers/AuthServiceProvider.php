<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Policies\ArticlePolicy;


class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('create-article', function ($user) {
            // Auteur = is_admin = false → peut créer
            // Admin  = is_admin = true  → ne peut pas créer
            return $user->is_admin === false;
        });

        // Gate::define('delete-article', function ($user, Article $article) {
        //     // Admin → peut tout supprimer
        //     if ($user->is_admin) {
        //         return true;
        //     }

        //     // Auteur → peut supprimer seulement ses propres articles
        //     return $article->user_id === $user->id;
        // });

        Gate::define('update-article', function ($user, Article $article) {
            // Admin → peut tout modifier
            if ($user->is_admin) {
                return true;
            }

            // Auteur → peut modifier seulement ses propres articles
            return $article->user_id === $user->id;
        });
    }

    protected $policies = [
    Article::class => ArticlePolicy::class,
];

}
