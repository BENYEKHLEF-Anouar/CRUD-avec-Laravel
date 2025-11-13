<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        // Affiche la vue du formulaire
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Étape 1 — Validation des données
        // Cette méthode vérifie les champs envoyés selon les règles définies
        $validated = $request->validate([
            'title'   => ['required','string','min:3','max:150'],
            'slug'    => ['nullable','string','max:180'],
            'content' => ['nullable','string'],
            'tags'    => ['nullable','string'],
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'title.min'      => 'Le titre doit contenir au moins :min caractères.',
            'title.max'      => 'Le titre doit contenir au plus :max caractères.',
        ]);

        // Étape 2 — Retour utilisateur
        // On redirige l’utilisateur vers le formulaire avec :
        // - les anciennes valeurs saisies (old input)
        // - un message flash de confirmation
        return back()
            ->withInput()
            ->with('status', 'Formulaire reçu avec succès ! (La sauvegarde sera ajoutée au chapitre 3.1.5)');
    }
}
