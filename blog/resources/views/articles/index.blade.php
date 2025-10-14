@extends('layouts.app')

@section('content')
  <h2>{{ $title }}</h2>

  @forelse ($articles as $a)
    <div class="card">
      <h3>
        <a href="{{ route('articles.show', $a['slug']) }}">{{ $a['title'] }}</a>
      </h3>
      <p>Auteur : {{ $a['author'] }} • Vues : {{ $a['views'] }}</p>
    </div>
  @empty
    <p>Aucun article disponible.</p>
  @endforelse
@endsection
