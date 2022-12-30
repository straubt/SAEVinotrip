<?php use App\Models\Sejour; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Séjours en attente</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styleCommandesEnAttente.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
<body>
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
    <h1 style="color: black;">Séjours en attente</h1>
  

<ul>
  @foreach($commande as $sejoursCommande)
  <?php $sejour = Sejour::find($sejoursCommande->id_sejour); 
  $PORT_SERVEUR_IMG = '8232';
  $tripPicture = 'http://51.83.36.122:' . $PORT_SERVEUR_IMG . '/sejours/' . $sejour->photo_sejour;
  ?>
    <li class="commande">
      <!-- Affichage de chaque champ de commande -->
      <div class="champ">
      <span style="font-size: 20px; text-decoration: underline;">Commande #{{$sejoursCommande->id_commande}} :</span>
      </div>
      <div class="champ">
        <span class="titre">Titre :</span>
        <span class="valeur">{{ $sejour->titre_sejour }}</span>
      </div>
      <div class="champ">
        <img src="{{$tripPicture}}" alt="">
      </div>
      <div class="champ">
        <span class="titre">Nombre d'adultes :</span>
        <span class="valeur">{{ $sejoursCommande->nb_adulte_commande }}</span>
      </div>
      <div class="champ">
        <span class="titre">Nombre d'enfants :</span>
        <span class="valeur">{{ $sejoursCommande->nb_enfant_commande }}</span>
      </div>
      <div class="champ">
        <span class="titre">Nombre de chambres :</span>
        <span class="valeur">{{ $sejoursCommande->nb_chambre_commande }}</span>
      </div>
      <div class="champ">
        <span class="titre">Début du séjour :</span>
        <span class="valeur">{{ $sejoursCommande->debut_sejour_commande }}</span>
      </div>
      <div class="champ">
        <span class="titre">Prix total :</span>
        <span class="valeur">{{ $sejoursCommande->prix_total_commande }} €</span>
      </div>
      <div class="champ">
        <span class="titre">Message :</span>
        <span class="valeur">{{ $sejoursCommande->message_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Etat de la commande :</span>
        <span class="valeur">En attente de paiement</span>
    </div>
    <form action="{{route('valider_et_payer')}}" method="post">
      @csrf
    <input type="hidden" name="id_commande" value="{{$sejoursCommande->id_commande}}">
    <button type="submit">Valider et payer</button>
    </form>
    </li>
    @endforeach
    @if(count($commande) == 0)
    <p>Vous n'avez aucune commande en cours...</p>
    @endif
</ul>
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


</html>