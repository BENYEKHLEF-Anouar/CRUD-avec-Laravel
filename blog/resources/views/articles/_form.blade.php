@csrf

<div style="margin-bottom:.75rem;">
  <label for="title">Titre *</label><br>
  <input id="title" name="title" type="text" value="{{ old('title', $article->title ?? '') }}" style="width:100%;padding:.5rem;border:1px solid #ccc;">
  @error('title') <div style="color:#b91c1c;">{{ $message }}</div> @enderror
</div>

<div style="margin-bottom:.75rem;">
  <label for="slug">Slug</label><br>
  <input id="slug" name="slug" type="text" value="{{ old('slug', $article->slug ?? '') }}" style="width:100%;padding:.5rem;border:1px solid #ccc;">
  @error('slug') <div style="color:#b91c1c;">{{ $message }}</div> @enderror
</div>

<div style="margin-bottom:.75rem;">
  <label for="excerpt">Extrait</label><br>
  <input id="excerpt" name="excerpt" type="text" value="{{ old('excerpt', $article->excerpt ?? '') }}" style="width:100%;padding:.5rem;border:1px solid #ccc;">
  @error('excerpt') <div style="color:#b91c1c;">{{ $message }}</div> @enderror
</div>

<div style="margin-bottom:.75rem;">
  <label for="content">Contenu</label><br>
  <textarea id="content" name="content" rows="6" style="width:100%;padding:.5rem;border:1px solid #ccc;">{{ old('content', $article->content ?? '') }}</textarea>
  @error('content') <div style="color:#b91c1c;">{{ $message }}</div> @enderror
</div>
