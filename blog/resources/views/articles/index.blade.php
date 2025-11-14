@extends('layouts.app')

@section('content')
  <h1>Articles</h1>

  @if (session('status'))
    <div style="background:#e6ffed;border:1px solid #86efac;padding:.5rem;margin-bottom:1rem;">
      {{ session('status') }}
    </div>
  @endif

  <a href="{{ route('articles.create') }}" style="display:inline-block;margin-bottom:1rem;padding:.5rem 1rem;background:#111;color:#fff;text-decoration:none;">+ Nouvel article</a>

  <table style="width:100%;border-collapse:collapse;">
    <thead>
      <tr>
        <th style="border-bottom:1px solid #ccc;text-align:left;">Titre</th>
        <th style="border-bottom:1px solid #ccc;text-align:left;">Slug</th>
        <th style="border-bottom:1px solid #ccc;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($articles as $a)
        <tr>
          <td>{{ $a->title }}</td>
          <td>{{ $a->slug }}</td>
          <td style="text-align:center;">
            <a href="{{ route('articles.edit', $a) }}">✏️</a>
            <form action="{{ route('articles.destroy', $a) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" onclick="return confirm('Supprimer ?')">🗑️</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="3">Aucun article disponible.</td></tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top:1rem;">
    {{ $articles->links() }}
  </div>
@endsection
