@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>{{ $title }}</h2>
    <p>Bienvenue sur le blog ! Consultez la <a href="{{ route('articles.index') }}">liste des articles</a>.</p>
  </div>
@endsection
