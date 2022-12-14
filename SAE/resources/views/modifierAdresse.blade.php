<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleModifAdresse.css">
    <link rel="stylesheet" href="css/styleFacturation.css">

    <title>Modifier Adresse</title>
</head>
<body>

<form method="POST" action="{{ url('/modify-address') }}">
        @csrf
        <label>Entrez votre nouvelle adresse :</label><br><br>
        <div id="autocomplete-container" class="autocomplete-container"></div>
            <input type="hidden" name="id_adresse" value="{{$adresse->id_adresse}}" required>
            <label>*Numéro de rue :</label>
            <input type="text" name="num_rue_adresse" pattern="(?!^undefined$).+" id="numero" required><br><br>
            <label>*Nom de la rue :</label>
            <input type="text" name="libelle_rue_adresse" pattern="(?!^undefined$).+" id="rue" required><br><br>

            <label>*Code postal :</label>
            <input type="text" name="code_postal_adresse" pattern="(?!^undefined$).+" id="codepostal" required><br><br>

            <label>*Ville :</label>
                <input type="text" name="libelle_commune" pattern="(?!^undefined$).+" id="ville" required><br><br>

            <label>*Numéro de téléphone :</label>
            <input type="text" name="num_tel_adresse" required><br><br>

            <input type="submit" value="Valider">
</form>
</body>
<script src="js/geo.js"></script>
</html>