<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil vinotrip Main</title>
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/caroussel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <script>
        var data = <?php echo json_encode($sejour);?>
    </script>
    <header> 

    <a href="/"><img id="logoPanier" src="images/panier.png"></a>
    <a href="/"><img id="logoSlogan" src="images/logo + slogan vinotrip.PNG"></a>
        <button id="route_des_vins" onclick="location.href='route-des-vins'">Route des vins</button>
       @guest <button id="loginButton" onclick="location.href='login'">Se Connecter</button>
        <button id="registerButton" onclick="location.href='register'">S'inscrire</button> @endguest
        @auth <button id="loginButton" onclick="location.href='profile'">Mon profil</button>
         <button id="registerButton" onclick="location.href='logout'">Se déconnecter</button> @endauth
    </header>   


    <div class="owl-carousel">
    </div>
        

        <section class="bandeau"> 
            <br>
            <p class="mentionl"> Nous utilisons des cookies et d'autres technologies qui sont indispensables pour vous fournir les 
                services et les fonctionnalités du site conformément à notre Avis sur les cookies. Si vous acceptez et cliquez sur 
                Tout accepter, nous autoriserons également des sociétés tierces partenaires à stocker des cookies sur votre appareil 
                et à utiliser des technologies similaires pour collecter et utiliser vos données personnelles (par exemple, l'adresse
                IP) à des fins de personnalisation des publicités, de mesure et d'analyse sur nos sites et en dehors. Vous pouvez 
                refuser votre consentement en cliquant sur Tout refuser ou faire des choix précis en sélectionnant Personnaliser 
                mes choix. Vous pouvez retirer votre consentement à tout moment sur la page https://nomDuSite.fr </p>  
            <br>
            <p class="ention"> Fins du traitement des données : stocker et/ou accéder à des informations sur un appareil. Publicités
                et contenu personnalisés, mesure de performance des publicités et du contenu, informations sur le public cible et
                développement de produits. </p> 
            <div id="boutons"> 
                <br>
                <button class="buttonBandeau" id="Accept">Accepter</button>
                <button class="buttonBandeau" id="Refus" onclick="togg()">Tout refuser</button> 
                <button class="buttonBandeau" id="Perso" input type="button" onclick="window.location.href = '../views/personalisationcookies.html';"/> Personnaliser mes choix
            </button> 
            </div> 
            
        </section> 
        <?php
    ?>

    <script src="../js/mainPageAcceuil.js"></script>
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
    <script src="js/jquery-3.6.1.slim.min.js"></script>
    <script src="js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/caroussel.js"></script>
</footer>
</html>