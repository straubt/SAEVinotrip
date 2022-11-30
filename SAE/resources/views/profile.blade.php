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
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
<body>
    <script>
        var client = <?php echo json_encode($client);?>;
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
            <div>
    </header>
    <div class="temp">
    </div>
</body>

<footer>
    <div class="txtFooter">
        <a href="" title="page d'accueil">
            Page d'Acceuil
        </a>
        <a href="" title="Mentions legales">
            Mentions legales
        </a>
        <a href="" title="Politique de Confidentialité">
            Politique de Confidentialité
        </a>
    </div>
    <div id="txtPayementSecu">Payement securisé :
        <br><img id="payementSecu" src="images/Paiement-Securise.png" title="Paiement sécurisé">
    </div>
<script src="js/profile.js"></script>
</footer>
</html>