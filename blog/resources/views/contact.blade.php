@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>{{ $title }}</h2>
    <p>Remplissez le formulaire pour nous contacter :</p>

    <form method="POST" action="#">
      @csrf
      <label>
        Nom :
        <input type="text" name="name" required>
      </label>
      <br><br>
      <label>
        Email :
        <input type="email" name="email" required>
      </label>
      <br><br>
      <label>
        Message :
        <textarea name="message" required></textarea>
      </label>
      <br><br>
      <button type="submit">Envoyer</button>
    </form>
  </div>
@endsection
