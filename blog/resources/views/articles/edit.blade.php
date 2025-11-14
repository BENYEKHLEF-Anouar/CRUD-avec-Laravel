@extends('layouts.app')

@section('content')
  <h1>Modifier : {{ $article->title }}</h1>
  <form method="POST" action="{{ route('articles.update', $article) }}" novalidate>
    @method('PUT')
    @include('articles._form', ['article' => $article])
    <button type="submit" style="padding:.5rem 1rem;background:#111;color:#fff;border:none;">Mettre à jour</button>
  </form>
@endsection
