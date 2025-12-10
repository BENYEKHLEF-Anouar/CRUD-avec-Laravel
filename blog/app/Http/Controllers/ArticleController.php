<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest('id')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {

        if (! Gate::allows('create-article')) {
            abort(403);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] ??= Str::slug($data['title']);
        Article::create($data);

        return redirect()->route('articles.index')
            ->with('status', 'Article créé avec succès.');
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $article->update($data);

        return redirect()->route('articles.index')
            ->with('status', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->back()->with('status', 'Article supprimé avec succès.');
    }
}
