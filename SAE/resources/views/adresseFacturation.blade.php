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
</body>
</html>
