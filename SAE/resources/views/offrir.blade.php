<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/styleOffrir.css">
  <title>Offrir un séjour</title>
</head>
<body>
  <h1>Offrir un séjour</h1>

  <div class="sejour">
    <img src="{{ $sejour->photo_sejour }}" alt="{{ $sejour->titre_sejour }}">
    <h2>{{ $sejour->titre_sejour }}</h2>
    <p>{{ $sejour->prix_min_individuel_sejour }} €</p>
  </div>

  <form method="post" action="{{ route('offrir-sejour.store') }}">
    @csrf

    <input type="hidden" name="id_sejour" value="{{ $sejour->id_sejour }}">

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <button type="submit">Envoyer le code</button>
  </form>
</body>
</html>
