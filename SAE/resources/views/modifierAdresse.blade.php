<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleModifAdresse.css">
    <title>Modifier Adresse</title>
</head>
<body>

<form method="POST" action="{{ url('/modify-address') }}">
        @csrf
        <label>Entrez votre nouvelle adresse :</label><br><br>

            <input type="hidden" name="id_adresse" value="{{$adresse->id_adresse}}" required>
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


</body>
</html>