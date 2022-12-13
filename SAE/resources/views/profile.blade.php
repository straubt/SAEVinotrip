<?php use App\Models\Client_Possede_Adresse;
use App\Models\Adresse;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Client</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styleProfil.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
<body>
    <script>
        var client = <?php echo json_encode($client);?>;
        var csrf = <?php echo json_encode(csrf_token());?>;
    </script>
       <header class="top-nav">
        <a href="/">Vinotrip</a>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <div class="menu">
            <a href="/">Accueil</a>
            <a href="/nos-sejours">Nos séjours</a>
            <a href="/route-des-vins">Routes des vins</a>
            @guest<a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>@endguest
            @auth<a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>@endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>
    <div class="parent">
        <div class="image"></div>
        <div class="infoFixe">
            <a id="prenomFixe">Prénom :</a>
            <a id="nomFixe">Nom :</a>
            <a id="mailFixe">Email :</a>
            <a id="dateFixe">Date de naissance :</a>
        </div>
        <div class="infos">
            @csrf
        </div>
        <a><button id="modification">Modifier informations </button></a>
    </div>
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
    </div>

    @endif
    @endforeach

    <script src="js/profile.js"></script>
</body>

<footer class="bot-nav">        
    <div class="lien">
        <a href="/">Page d'accueil</a>
        <a href="/">Mentions legales</a>
        <a href="/">Politique de Confidentialité</a>
    </div>
    <br>
    <div id="Payement">Payement securisé :
        <br><img id="payementSecu" src="images/Paiement-Securise.png" title="Paiement sécurisé">
    </div>
    <br>
</footer>
</html>