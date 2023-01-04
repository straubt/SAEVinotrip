<?php use Gloudemans\Shoppingcart\Facades\Cart; 
// // Mise à jour de la quantité de l'élément du panier avec la méthode update() de Cart
// Cart::update($itemId, ['qty' => $quantity]);

// // Mise à jour du prix de l'élément du panier avec la méthode setGlobalDiscount() de Cart
// Cart::setGlobalDiscount($discount, false);

// // Récupération du prix total du panier avec la méthode total() de Cart
// $total = Cart::total();

// // Envoi du prix total du panier au navigateur en utilisant une réponse JSON
// echo json_encode(['total' => $total]);
$PORT_SERVEUR_IMG = '8232';

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/stylePanier.css">
    <link rel="stylesheet" href="css/over_image.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
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

    <h1>Votre panier</h1>
    <div style="float: right;">
  <h3 >J'ai un code</h3>
  <input type="text" id="codeInput">
  <button type="button" onclick="validateCode()">Valider</button>
  </div>
  <div>
  <a href="/mesCommandes" ><button type="button">Commandes en cours</button></a>
  </div>

    @if (Cart::content()->isNotEmpty())
  <div class="cart">
    <div class="cart-header">
      <h3>Votre Panier</h3>
      <p>{{ count(Cart::content()) }} séjour(s)</p>
    </div>

    <div class="cart-items">
      @foreach (Cart::content() as $item)
      <?php $tripPicture = 'http://51.83.36.122:' . $PORT_SERVEUR_IMG . '/sejours/' . $item->model->photo_sejour; ?>
        <div class="cart-item">
          <img src="{{ $tripPicture }}" alt="{{ $item->model->titre_sejour }}">
          <div class="cart-item-details">
            <h4>{{ $item->model->titre_sejour }}</h4>
            <p>{{ $item->model->prix_min_individuel_sejour }} €</p>
            <p>Du {{$item->options->dateArrive}}</p>
            <p>au {{$item->options->dateDepart}}</p>
            <!-- Ajouter un sélecteur pour choisir le nombre de personnes -->
            <select class="cart-item-quantity" id="adults" data-item-id="{{ $item->model->id_sejour }}" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="1">1 Adulte</option>
              <option value="2">2 Adultes</option>
              <option value="3">3 Adultes</option>
              <option value="4">4 Adultes</option>
            </select>
            <select class="cart-item-quantity" id="children" data-item-id="{{ $item->model->id_sejour }}" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="0">0 Enfant</option>
              <option value="0.5">1 Enfant</option>
              <option value="1">2 Enfants</option>
              <option value="1.5">3 Enfants</option>
              <option value="2">4 Enfants</option>
            </select>
            <select class="cart-item-quantity" id="nights" data-item-id="{{ $item->model->id_sejour }}" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="0">0 nuit</option>
              <option value="1">1 nuit</option>
              <option value="2">2 nuits</option>
              <option value="3">3 nuits</option>
            </select>
            </div>
            <p class="cart-item-remove">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
            </form>
            </p>
            <button onClick="window.location.href='/offrir-sejour/{{$item->model->id_sejour}}'">Offrir</button>
            </div>
            @endforeach
            </div>
            <!-- Ajouter un élément pour afficher le prix total mis à jour en temps réel -->
            <div class="cart-total">
            <p>Total: <span id="cart-total-price">{{ Cart::total() }}</span> €</p>
            </div>  
            <div class="cart-actions">
            </form>
            <form action="{{route('update-cart')}}" id="form-panier" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="price" value="">
              <input type="hidden" name="tabCommande" value="">
              <input type="hidden" name="date" value="">
              <button id="submit-button">Valider mon panier</button>
            </form>
            </div>
            </div>
            <a href="/videpanier"><button class="btn1">Tout supprimer</button></a>

    @else
    <p>Votre panier est vide.</p>
    @endif


    <!-- Ajouter du code JavaScript pour mettre à jour le prix total en temps réel en fonction du nombre de personnes sélectionné -->
    <script> 
  // Récupération des données du panier depuis le serveur PHP
  var lesSejours = <?php echo json_encode(Cart::content());?>;

  // Conversion des données du panier en tableau
  var lesSejours = Object.values(lesSejours);

  // Récupération des sélecteurs de quantité et de l'élément de prix total du panier
  const quantitySelectors = document.querySelectorAll('.cart-item-quantity');
  const cartTotalPriceElement = document.querySelector('#cart-total-price');

  let totalPrice = 0;

// Fonction pour mettre à jour le prix total en fonction du nombre d'adultes, d'enfants et de nuits sélectionnés
function updateTotalPrice() {
  totalPrice = 0;
  lesSejours.forEach(function(sejour) {
    // Récupération des données de quantité pour chaque séjour
    const adults = document.querySelector('#adults[data-item-id="' + sejour.id + '"]').value;
    const children = document.querySelector('#children[data-item-id="' + sejour.id + '"]').value;
    const nights = document.querySelector('#nights[data-item-id="' + sejour.id + '"]').value;

    // Calcul du prix total pour chaque séjour en fonction du nombre d'adultes, d'enfants et de nuits sélectionnés
    const sejourTotalPrice = (sejour.price * adults) + (sejour.price * children * 0.5) + (sejour.price * nights);
    // Mise à jour du prix total global
    totalPrice += sejourTotalPrice;
  });

  // Affichage du prix total mis à jour dans l'élément de prix total du panier
  cartTotalPriceElement.innerHTML = totalPrice;
}

// Ajout d'un évènement de changement de valeur pour chaque sélecteur de quantité
quantitySelectors.forEach(function(selector) {
  selector.addEventListener('change', function() {
    updateTotalPrice();
  });
});
  const submitButton = document.querySelector('#submit-button');
  const priceInput = document.querySelector('input[name="price"]');
  const tabCommandeInput = document.querySelector('input[name="tabCommande"]');
 // Définition de la variable "tabCommande" qui va contenir les données de chaque séjour
 let tabCommande = [];

 const form = document.querySelector('#form-panier');


// Ajout d'un évènement de clic sur le bouton de validation du panier
submitButton.addEventListener('click', (event) => {
  // Mise à jour de la valeur du champ de formulaire "price" avec le prix total
  priceInput.value = totalPrice;
  
  // Récupération des données de quantité pour chaque séjour
  lesSejours.forEach(function(sejour) {
    const adultsInput = document.querySelector('#adults[data-item-id="' + sejour.id + '"]').value;
    const childrenInput = document.querySelector('#children[data-item-id="' + sejour.id + '"]').value * 2;
    const nightsInput = document.querySelector('#nights[data-item-id="' + sejour.id + '"]').value;
    const sejourPrice = (sejour.price * adultsInput) + (sejour.price * childrenInput * 0.5) + (sejour.price * nightsInput);
    const date = sejour.options .dateArrive;
    // Ajout des données de quantité pour chaque séjour à la variable "tabCommande"
    tabCommande.push({
      id: sejour.model.id_sejour,
      adults: adultsInput,
      children: childrenInput,
      nights: nightsInput,
      priceTrip: sejourPrice,
      date: date
    });
  });
  // Mise à jour de la valeur du champ de formulaire "tabCommande" avec les données de chaque séjour
  tabCommandeInput.value = JSON.stringify(tabCommande);
  // Vérification de l'identification de l'utilisateur
  // Soumission du formulaire
  form.submit();

});

  
  // Mettre à jour le prix total lorsque la page est chargée pour la première fois
  updateTotalPrice();

  function validateCode() {
  // Récupérer la valeur saisie dans le champ de saisie
  var code = document.getElementById('codeInput').value;

  // Vérifier si le code est correct
  if (code == '123456') {
    window.location = '/selectionDatesCadeau';
  } else {
    alert('Code incorrect !');
  }
}

</script>

    


</body>
<!-- <footer class="bot-nav">        
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
</footer> -->
</html>