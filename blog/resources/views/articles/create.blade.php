@extends('layouts.app')

@section('content')
  <h1>Créer un article</h1>
  <form method="POST" action="{{ route('articles.store') }}" novalidate>
    @include('articles._form')
    <button type="submit" style="padding:.5rem 1rem;background:#111;color:#fff;border:none;">Créer</button>
  </form>
@endsection
