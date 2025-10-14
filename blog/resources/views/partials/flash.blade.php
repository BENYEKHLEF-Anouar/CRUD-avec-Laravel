@if (session('success'))
  <p class="card" role="status">{{ session('success') }}</p>
@endif
@if ($errors->any())
  <div class="card" role="alert">
    <strong>Erreurs :</strong>
    <ul>
      @foreach ($errors->all() as $msg)
        <li>{{ $msg }}</li>
      @endforeach
    </ul>
  </div>
@endif
