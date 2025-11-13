@extends('layouts.app')

@section('content')
  <h1>Créer un article</h1>

  <form method="POST" action="{{ route('articles.store') }}" novalidate>
    @csrf

    <div style="margin-bottom:.75rem;">
      <label for="title">Titre *</label><br>
      <input id="title" name="title" type="text"
             value="{{ old('title') }}" required
             style="width:100%;padding:.5rem;border:1px solid #ccc;">
      @error('title')
        <div style="color:#b91c1c;font-size:.9rem;">{{ $message }}</div>
      @enderror
    </div>

    <div style="margin-bottom:.75rem;">
      <label for="slug">Slug</label><br>
      <input id="slug" name="slug" type="text"
             value="{{ old('slug') }}" placeholder="ex : mon-super-article"
             style="width:100%;padding:.5rem;border:1px solid #ccc;">
      @error('slug')
        <div style="color:#b91c1c;font-size:.9rem;">{{ $message }}</div>
      @enderror
    </div>

    <div style="margin-bottom:.75rem;">
      <label for="content">Contenu</label><br>
      <textarea id="content" name="content" rows="6"
                style="width:100%;padding:.5rem;border:1px solid #ccc;">{{ old('content') }}</textarea>
      @error('content')
        <div style="color:#b91c1c;font-size:.9rem;">{{ $message }}</div>
      @enderror
    </div>

    <div style="margin-bottom:1rem;">
      <label for="tags">Tags (séparés par des virgules)</label><br>
      <input id="tags" name="tags" type="text"
             value="{{ old('tags') }}" placeholder="php, laravel"
             style="width:100%;padding:.5rem;border:1px solid #ccc;">
      @error('tags')
        <div style="color:#b91c1c;font-size:.9rem;">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" style="padding:.6rem 1rem;background:#111;color:#fff;border:0;">
      Enregistrer (brouillon)
    </button>
  </form>
@endsection
