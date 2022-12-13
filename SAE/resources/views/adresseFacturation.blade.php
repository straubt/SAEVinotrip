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
            <label>*Numéro de rue :</label>
            <input type="text" name="num_rue_adresse" required><br><br>
            <label>*Libellé de la rue :</label>
            <input type="text" name="libelle_rue_adresse" required><br><br>

            <label>*Code postal :</label>
            <input type="text" name="code_postal_adresse" required><br><br>

            <label>*Commune :</label>
            <input type="text" name="libelle_commune" required><br><br>

            <label>*Numéro de téléphone :</label>
            <input type="text" name="num_tel_adresse" required><br><br>

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
    <input type="submit" value="Utiliser cette adresse"></input>
    </div>

    @endif
    @endforeach
</body>
</html>
