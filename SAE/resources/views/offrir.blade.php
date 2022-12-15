<?php 
$PORT_SERVEUR_IMG = '8232';
$tripPicture = 'http://51.83.36.122:' . $PORT_SERVEUR_IMG . '/sejours/' . $sejour->photo_sejour;
?>
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
  <img src="{{ $tripPicture }}" alt="{{ $sejour->titre_sejour }}">
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
  <label for="nb_adultes">Nombre d'adultes</label>
  <input type="number" name="nb_adultes" id="nb_adultes" min="1" value="{{ old('nb_adultes') }}" required>
  <label for="nb_enfants">Nombre d'enfants</label>
  <input type="number" name="nb_enfants" id="nb_enfants" min="1" value="{{ old('nb_enfants') }}">
  <label for="nb_nuits">Nombre de nuits</label>
  <input type="number" name="nb_nuits" id="nb_nuits" min="1" value="{{ old('nb_nuits') }}" required>
</div>

<div class="form-group" id="prix">
  <label>Prix total : {{ ($sejour->prix_min_individuel_sejour * old('nb_adultes') + $sejour->prix_enfant * old('nb_enfants')) * old('nb_nuits')}} €</label>
</div>

<button type="submit">Valider et payer</button>
</form>
</body>
<script>
  var sejour = <?php echo json_encode($sejour);?>;
  const form = document.querySelector('form');
  const nbAdultesInput = document.querySelector('#nb_adultes');
  const nbEnfantsInput = document.querySelector('#nb_enfants');
  const nbNuitsInput = document.querySelector('#nb_nuits');
  const prixTotalLabel = document.querySelector('#prix label');

  form.addEventListener('input', () => {
    const nbAdultes = parseInt(nbAdultesInput.value);
    const nbEnfants = parseInt(nbEnfantsInput.value);
    const nbNuits = parseInt(nbNuitsInput.value);
    const sejourPrix = parseInt(sejour.prix_min_individuel_sejour );
    const prixTotal = (sejourPrix * nbAdultesInput.value + sejourPrix * nbEnfantsInput.value) * nbNuitsInput.value;
    console.log(nbAdultes);
    prixTotalLabel.innerHTML = `Prix total : ${prixTotal} €`;
  });
</script>

</html>

</html>
