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
  <p>Prix : {{ $sejour->prix_min_individuel_sejour }} € par personne</p>
</div>

<form method="post" action="{{ route('offrir-sejour.store') }}">
  @csrf

  <input type="hidden" name="id_sejour" value="{{ $sejour->id_sejour }}">

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
  </div>

  <div class="form-group">
    <label for="nb_personnes">Nombre de personnes</label>
    <input type="number" name="nb_personnes" id="nb_personnes" min="1" value="{{ old('nb_personnes') }}" required>
  </div>

  <div class="form-group" id="prix">
    <label>Prix total : {{ $sejour->prix_min_individuel_sejour * old('nb_personnes') }} €</label>
  </div>

  <button type="submit">Valider et payer</button>
</form>
</body>
<script>
  const form = document.querySelector('form');
  const nbPersonnesInput = document.querySelector('#nb_personnes');
  const prixTotalLabel = document.querySelector('#prix');
  const prixIndividuel = {{ $sejour->prix_min_individuel_sejour }};

  nbPersonnesInput.addEventListener('input', () => {
    const nbPersonnes = nbPersonnesInput.value;
    const prixTotal = nbPersonnes * prixIndividuel;
    prixTotalLabel.textContent = `Prix total: ${prixTotal} €`;
  });
</script>

</html>
