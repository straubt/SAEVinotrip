<?php use App\Models\Client_Possede_Adresse;
use App\Models\Adresse;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Adresse de facturation</title>
    <link rel="stylesheet" href="css/styleFacturation.css">
</head>
    <body>
        <h1>Adresse de facturation</h1>
        <form action="{{ route('traitement-adresse') }}" method="POST">
        @csrf
            <div id="autocomplete-container" class="autocomplete-container"></div>
            <label>*Numéro de la rue :</label>
            <input type="text" name="num_rue_adresse" pattern="(?!^undefined$).+" id="numero" required><br><br>

            <label>*Nom de la rue :</label>
            <input type="text" name="libelle_rue_adresse" pattern="(?!^undefined$).+" id="rue" required><br><br>

            <label>*Code postal :</label>
            <input type="text" name="code_postal_adresse" pattern="(?!^undefined$).+" id="codepostal" required><br><br>

            <label>*Ville :</label>
            <input type="text" name="libelle_commune" pattern="(?!^undefined$).+" id="ville" required><br><br>

            <label>*Numéro de téléphone :</label>
            <input type="text" name="num_tel_adresse" pattern="((?:\+\d{2}[-.\s]?(?:\(0\)|0)*?[-.\s]?|00[-.\s]?\d{2}[-.\s]?(?:\(0\)|0)*?[-.\s]?|0)\d?[-.\s]?(?:\d{2}[-.\s]?){3,4})(?:$|\D)"     required><br><br>
 
            <input type="submit" value="Valider">
    </form>
    <h3>Vos adresses :</h3>
    @foreach($client_possede_adresse as $adressePossede)
    @if($adressePossede::where('id_client', $client->id_client)->exists())
    <div class="adresses">
    <?php $adresse = Adresse::find($adressePossede->id_adresse);?>
    <h3>Numéro de rue :</h3>
    <p>{{$adresse->num_rue_adresse}}</p>

    <h3>Libellé de la rue :</h3>
    <p>{{$adresse->libelle_rue_adresse}}</p>

    <h3>Code postal :</h3>
    <p>{{$adresse->code_postal_adresse}}</p>

    <h3>Libellé de la commune :</h3>
    <p>{{$adresse->libelle_commune}}</p>

    <h3>Numéro de téléphone :</h3>
    <p>{{$adresse->num_tel_adresse}}</p>
    <form action="{{ route('utiliser-adresse') }}" method="POST">
        @csrf
    <input type="hidden" name="id_adresse" value="{{$adresse->id_adresse}}" ><br><br>
    <input type="submit" value="Utiliser cette adresse"></input>
    </div>

    @endif
    @endforeach
</body>
<script src="js/geo.js"></script>
</html>
