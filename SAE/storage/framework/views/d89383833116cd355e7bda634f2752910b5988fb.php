<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil vinotrip Main</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleCookies.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styleCookies.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
<body>    

    <script>
        var data = <?php echo json_encode($sejour);?>;
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
            <?php if(auth()->guard()->guest()): ?><a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a><?php endif; ?>
            <?php if(auth()->guard()->check()): ?><a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a><?php endif; ?>
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img><?php echo e(count(Cart::content())); ?></a>
        <div>
        <div class="vinotrip-container">
            <h1 class="vinotrip-title">Créateur de séjours œnotouristiques</h1>
            <p class="vinotrip-description">Spécialiste de l’œnotourisme, VINOTRIP vous emmène à la découverte des régions viticoles françaises. Nous créons pour vous des séjours personnalisables en fonction de vos envies.</p>
        </div>
    </header>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

    <div class="owl-carousel">
        
    </script>

    </div>

    <script>
        var sejour = <?php echo json_encode($sejourTri);?>;
        var destination = <?php echo json_encode($destination);?>;
        var categorie_participant = <?php echo json_encode($categorie_participant);?>;
        var lesThemes = <?php echo json_encode($theme);?>;
        var sejour_to_cat_participant = <?php echo json_encode($sejour_to_cat_participant);?>;
        var domaine = "";
        var participant = "";
        var theme = "";
    </script>
   

    <div id="cookie-banner">
        <p class="mentionl"> Nous utilisons des cookies et d'autres technologies qui sont indispensables pour vous fournir les 
                services et les fonctionnalités du site conformément à notre Avis sur les cookies. Si vous acceptez et cliquez sur 
                Tout accepter, nous autoriserons également des sociétés tierces partenaires à stocker des cookies sur votre appareil 
                et à utiliser des technologies similaires pour collecter et utiliser vos données personnelles (par exemple, l'adresse
                 IP) à des fins de personnalisation des publicités, de mesure et d'analyse sur nos sites et en dehors. Vous pouvez 
                 refuser votre consentement en cliquant sur Tout refuser ou faire des choix précis en sélectionnant Personnaliser 
                 mes choix. Vous pouvez retirer votre consentement à tout moment sur la page https://nomDuSite.fr </p>  
        <p class="ention"> Fins du traitement des données : stocker et/ou accéder à des informations sur un appareil. Publicités
                 et contenu personnalisés, mesure de performance des publicités et du contenu, informations sur le public cible et
                  développement de produits. </p> 
        <a href="/politiqueDeConfidentialite">En savoir plus</a></p>
        <div id="cookie-banner-button">
            <button class="cookie-banner-button">Accepter</button>
            <button class="cookie-banner-button">Refuser</button>
            <button id="cookie-banner-button-Edit" class="cookie-banner-button" onclick="location.href = '/personnalisationCookie'">Personaliser</button>
        </div>
    </div>



    
    <div class="sejoursActus"></div>

<button id="sejoursButton">OUI</button>
</body>

<script src="js/afficheSejoursAccueil.js"></script>


<footer class="bot-nav">        
    <div class="lien">
        <a href="/">Page d'accueil</a>
        <a href="/mentionsLegales">Mentions legales</a>
        <a href="/politiqueDeConfidentialite">Politique de Confidentialité</a>
    </div>
    <br>
    <div id="Payement">Payement securisé :
        <br><img id="payementSecu" src="images/Paiement-Securise.png" title="Paiement sécurisé">
    </div>
    <br>
</footer>
<script src="js/mainPagePersonalisation.js"></script>
<script src="../js/mainPageAcceuil.js"></script>
<script src="js/jquery-3.6.1.slim.min.js"></script>
<script src="js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/caroussel.js"></script>

<script>
    document.querySelector('#cookie-banner').hidden = false;
</script>

</html><?php /**PATH /home/poulje/SAEVinotrip/SAE/resources/views/welcome.blade.php ENDPATH**/ ?>