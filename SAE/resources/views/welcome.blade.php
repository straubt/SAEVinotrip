<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil vinotrip Main</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
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
            @guest<a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>@endguest
            @auth<a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>@endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

    <div class="owl-carousel">
    </div>


    <div class="banner">
        <p class="descriptionSite" data-aos="fade-up"> Bienvenue dans vinotrip ! Votre site spécialisée dans l'oenotourisme. Nous vous proposons les meilleurs séjours adpatés à vos envies</p>

    <div id="raisins"></div>

    <script type="text/javascript">
function animateElementOnScroll(element, backgroundImageUrl) {
  // Déclarez une variable pour stocker la valeur de l'échelle
  let scale = 100;

  // Déclarez une variable pour stocker la taille maximale de l'élément
  let maxElementSize = 200;

  window.addEventListener("wheel", function(event) {
    // Incrémenter ou décrémenter l'échelle en fonction de la valeur de deltaY
    scale += event.deltaY;

    // Si l'échelle est comprise entre 1200 et 13000, ajuster la taille de l'élément
    if (scale > 1200 && scale < 13000) {
      // Si deltaY est positif, augmenter la taille de l'élément
      if (event.deltaY > 0) {
        maxElementSize += 3;
      } 
      // Sinon, si deltaY est négatif, diminuer la taille de l'élément
      else if (event.deltaY < 0) {
        maxElementSize -= 5;
      }

      // Limiter la taille de l'élément à un maximum de 400
      if (maxElementSize > 400) {
        maxElementSize = 400;
      }
      // Limiter la taille de l'élément à un minimum de 20
      else if (maxElementSize < 20) {
        maxElementSize = 20;
      }

      // Appliquer la nouvelle taille de l'élément à l'élément
      element.style.width = maxElementSize + "vw";
      element.style.height = maxElementSize + "vh";

      // Appliquer l'image de fond souhaitée à l'élément
      element.style.backgroundImage = "url('" + backgroundImageUrl + "')";
    }
  });
}

// Exemple d'utilisation de la fonction
let raisins = document.querySelector("#raisins");
let backgroundImageUrl = "../video/raisins.mp4";
animateElementOnScroll(raisins, backgroundImageUrl);

        
    </script>
   <script>
  AOS.init();
</script>
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


</body>

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
<script src="../js/mainPageAcceuil.js"></script>
<script src="js/jquery-3.6.1.slim.min.js"></script>
<script src="js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/caroussel.js"></script>

</html>