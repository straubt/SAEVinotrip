<!DOCTYPE html>
<html>
<head>
	<title>Adresse de facturation</title>
</head>
<body>
	<h1>Adresse de facturation</h1>
	<form action="traitement_adresse.php" method="POST">
		<label>Numéro de rue :</label>
		<input type="text" name="num_rue_adresse" required><br><br>
        <label>Libellé de la rue :</label>
        <input type="text" name="libelle_rue_adresse" required><br><br>

        <label>Code postal :</label>
        <input type="text" name="code_postal_adresse" required><br><br>

        <label>Commune :</label>
        <input type="text" name="libelle_commune" required><br><br>

        <label>Numéro de téléphone :</label>
        <input type="text" name="num_tel_adresse"><br><br>

        <input type="submit" value="Valider">
</form>
</body>
</html>
