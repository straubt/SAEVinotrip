<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejours en attente</title>
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
        <p>Connecté en tant que directeur commercial</p>

        <div class="menu">
            <a href="/welcomeAdmin">Séjours</a>
            <a href="/commandesEnAttente">Commandes en attente</a>
            <a href="/logout">Deconnexion</a>
        <div>
    </header>
    <h1 style="color: black;">Commandes en attente</h1>
  

<ul>
  @foreach($commande as $sejoursCommande)
    <li class="commande">
      <!-- Affichage de chaque champ de commande -->
      <div class="champ">
      <span style="font-size: 20px; text-decoration: underline;">Commande #{{$sejoursCommande->id_commande}} :</span>
      </div>
      <div class="champ">
        <span class="titre">ID de séjour :</span>
        <span class="valeur">{{ $sejoursCommande->id_sejour }}</span>
      </div>
      <div class="champ">
        <span class="titre">ID de client :</span>
        <span class="valeur">{{ $sejoursCommande->id_client }}</span>
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
        <span class="valeur">{{ $sejoursCommande->prix_total_commande }}</span>
      </div>
      <div class="champ">
        <span class="titre">Message :</span>
        <span class="valeur">{{ $sejoursCommande->message_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Code d'état de la commande :</span>
        <span class="valeur">{{ $sejoursCommande->code_etat_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Date de demande de vérification de disponibilité :</span>
        <span class="valeur">{{ $sejoursCommande->date_dmd_verif_dispo_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Date de demande de paiement :</span>
        <span class="valeur">{{ $sejoursCommande->date_dmd_paiement_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Date de paiement :</span>
        <span class="valeur">{{ $sejoursCommande->date_paiement_commande }}</span>
    </div>
    <div class="champ">
        <span class="titre">Date de demande de remplacement :</span>
        <span class="valeur">{{ $sejoursCommande->date_dmd_replace_commande }}</span>
    </div>
    <div class="champ">
    <button onclick="alert('Hébergement disponible !')">Envoyer mails aux établissements</button>
    </div>
    <div class="champ">
    <form action="{{route('confirmer-commande')}}" method="post">
        @csrf
        <input type="hidden" name="id_commande" value="{{$sejoursCommande->id_commande}}">
        <button type="submit">Envoyer confirmation au client</button>
    </form>
    </div>
    </li>
    @endforeach

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