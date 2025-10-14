@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>{{ $article['title'] }}</h2>
    <p><a href="{{ route('articles.index') }}">← Retour à la liste</a></p>
    <ul>
      <li>Auteur : {{ $article['author'] }}</li>
      <li>Slug : <code>{{ $article['slug'] }}</code></li>
      <li>Vues : {{ $article['views'] }}</li>
    </ul>
  </div>
@endsection
