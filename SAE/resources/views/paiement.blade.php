<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/stylePay.css">
    <title>Enregistrement des données de la carte de crédit</title>
</head>
<body>
    <h1>Enregistrement des données de la carte de crédit</h1>
    <form action="/cb/store" method="POST">
        @csrf
        <label for="numero_carte_cb">Numéro de la carte de crédit :</label><br>
        <input type="text" id="numero_carte_cb" name="numero_carte_cb" value=""><br>
        <!-- Récupérer la valeur de id_cb depuis les données d'authentification et d'autorisation -->
        <input type="hidden" id="id_cb" name="id_cb" value="{{ auth()->user()->id_cb }}"><br>
        <!-- Récupérer la valeur de id_client depuis les données d'authentification et d'autorisation -->
        <input type="hidden" id="id_client" name="id_client" value="{{ auth()->user()->id_client }}"><br>
        <label for="date_expiration_cb">Date d'expiration de la carte de crédit :</label><br>
        <input type="date" id="date_expiration_cb" name="date_expiration_cb" value=""><br>
        <label for="crypto_visuel_cb">Cryptogramme visuel de la carte de crédit :</label><br>
        <input type="text" id="crypto_visuel_cb" name="crypto_visuel_cb" value=""><br>
        <label for="nom_banque_cb">Nom de la banque :</label><br>
        <input type="text" id="nom_banque_cb" name="nom_banque_cb" value=""><br>
        <label for="enregistrer">Enregistrer les données de la carte de crédit ?</label><br>
        <input type="checkbox" id="enregistrer" name="enregistrer" value="1"><br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
