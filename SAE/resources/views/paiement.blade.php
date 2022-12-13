<?php use Illuminate\Support\Facades\Crypt; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/stylePay.css">
    <title>Paiement sécurisé</title>
</head>
<body>
    <h1>Paiement sécurisé</h1>
    @foreach ($cb as $carte)
    <?php
    $fin_numero = substr($carte->numero_carte_cb, -3); ?>
    <div>
    <p class="credit-card-text">Carte bancaire se terminant par : {{$fin_numero}} <p>
    <img src="images/banque.png" alt="" srcset="" id="logobanque">
    <form action="" method="POST" class="credit-card-form">
    @csrf
    <input type="hidden" id="numero_carte_cb" name="numero_carte_cb" value="{{ $carte->numero_carte_cb }}">
    <input type="hidden" id="id_cb" name="id_cb" value="{{ $carte->id_cb }}"><br>
    <input type="hidden" id="id_client" name="id_client" value="{{ $carte->id_client }}"><br>
    <input type="hidden" id="date_expiration_cb" name="date_expiration_cb" value="{{ $carte->date_expiration_cb }}"><br>
    <input type="hidden" id="crypto_visuel_cb" name="crypto_visuel_cb" value="{{ $carte->crypto_visuel_cb }}"><br>
    <input type="hidden" id="nom_banque_cb" name="nom_banque_cb" value="{{ $carte->nom_banque_cb }}"><br>
    <input type="submit" value="Payer avec cette carte">
    </form>
    <form action="{{ route('delete-card') }}" method="POST" class="credit-card-form">
    @csrf
    <input type="hidden" id="numero_carte_cb" name="numero_carte_cb" value="{{ $carte->numero_carte_cb }}">
    <input type="hidden" id="id_cb" name="id_cb" value="{{ $carte->id_cb }}"><br>
    <input type="hidden" id="id_client" name="id_client" value="{{ $carte->id_client }}"><br>
    <input type="hidden" id="date_expiration_cb" name="date_expiration_cb" value="{{ $carte->date_expiration_cb }}"><br>
    <input type="hidden" id="crypto_visuel_cb" name="crypto_visuel_cb" value="{{ $carte->crypto_visuel_cb }}"><br>
    <input type="hidden" id="nom_banque_cb" name="nom_banque_cb" value="{{ $carte->nom_banque_cb }}"><br>
    <input type="submit" value="Supprimer" id="suppr">
    </form>
    </div>

    @endforeach
    <div class="new-credit-card-form">
    <h2>Nouvelle carte de crédit :</h2>
    <form action="/cb/store" method="POST" >
        @csrf
        <label for="numero_carte_cb">Numéro de la carte de crédit :</label><br>
        <input type="text" id="numero_carte_cb" name="numero_carte_cb" value="" required><br>
        <!-- Récupérer la valeur de id_cb depuis les données d'authentification et d'autorisation -->
        <input type="hidden" id="id_cb" name="id_cb" value="{{ auth()->user()->id_cb }}" required><br>
        <!-- Récupérer la valeur de id_client depuis les données d'authentification et d'autorisation -->
        <input type="hidden" id="id_client" name="id_client" value="{{ auth()->user()->id_client }}" required><br>
        <label for="date_expiration_cb">Date d'expiration de la carte de crédit :</label><br>
        <input type="date" id="date_expiration_cb" name="date_expiration_cb" value="" required><br>
        <label for="crypto_visuel_cb">Cryptogramme visuel de la carte de crédit :</label><br>
        <input type="text" id="crypto_visuel_cb" name="crypto_visuel_cb" value="" required><br>
        <label for="nom_banque_cb">Nom de la banque :</label><br>
        <input type="text" id="nom_banque_cb" name="nom_banque_cb" value="" required><br>
        <label for="enregistrer">Enregistrer les données de la carte de crédit ?</label><br>
        <input type="checkbox" id="enregistrer" name="enregistrer" value="1"><br><br>
        <input type="submit" value="Payer">
    </form>
    </div>
</body>
</html>
