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
            <?php if(auth()->guard()->guest()): ?><a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a><?php endif; ?>
            <?php if(auth()->guard()->check()): ?><a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a><?php endif; ?>
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img><?php echo e(count(Cart::content())); ?></a>
        <div>
    </header>
    <div class="parent">
        <div class="image"></div>
        <div class="info">
            <div class="infoFixe">
                <br>
                <a id="prenomFixe">Prénom :</a>
                <a id="nomFixe">Nom :</a>
                <a id="mailFixe">Email :</a>
                <a id="dateFixe">Date de naissance :</a>
            </div>
            <div class="infos">
               <?php echo csrf_field(); ?>
            </div>
        </div>
        <button id="modification">Modifier informations </button></a>
    </div>

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
</html><?php /**PATH /home/poulje/SAEVinotrip/SAE/resources/views/profile.blade.php ENDPATH**/ ?>