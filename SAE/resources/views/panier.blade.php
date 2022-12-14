<?php use Gloudemans\Shoppingcart\Facades\Cart; 
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
    <a href="/videpanier"><button class="btn1">Tout supprimer</button></a>

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

            <!-- Ajouter un sélecteur pour choisir le nombre de personnes -->
            <select class="cart-item-quantity" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="1">1 Adulte</option>
              <option value="2">2 Adultes</option>
              <option value="3">3 Adultes</option>
              <option value="4">4 Adultes</option>
            </select>
            <select class="cart-item-quantity" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="0">0 Enfant</option>
              <option value="0.5">1 Enfant</option>
              <option value="1">2 Enfants</option>
              <option value="1.5">3 Enfants</option>
              <option value="2">4 Enfants</option>
            </select>
            <select class="cart-item-quantity" data-price="{{ $item->model->prix_min_individuel_sejour }}">
              <option value="0">1 nuit</option>
              <option value="1">2 nuits</option>
              <option value="2">3 nuits</option>
              <option value="3">4 nuits</option>
            </select>
            </div>
            <p class="cart-item-remove">
            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
            </form>
            </p>
            </div>
            @endforeach
            </div>
            <!-- Ajouter un élément pour afficher le prix total mis à jour en temps réel -->
            <div class="cart-total">
            <p>Total: <span id="cart-total-price">{{ Cart::total() }}</span> €</p>
            </div>  

            <div class="cart-actions">
            <a href="/adresseFacturation"><button>Valider mon panier</button></a>
            </form>
            </div>
            </div>
    @else
    <p>Votre panier est vide.</p>
    @endif
    <!-- Ajouter du code JavaScript pour mettre à jour le prix total en temps réel en fonction du nombre de personnes sélectionné -->
    <script>
    const quantitySelectors = document.querySelectorAll('.cart-item-quantity');
    const cartTotalPriceElement = document.querySelector('#cart-total-price');
    let totalPrice = 0;

    // Fonction pour mettre à jour le prix total en fonction du nombre de personnes sélectionnées
    function updateTotalPrice() {
        // Réinitialiser le prix total à 0
        totalPrice = 0;

        // Pour chaque sélecteur, récupérer le nombre de personnes sélectionnées et le prix individuel
        // et ajouter le prix au prix total
        quantitySelectors.forEach(selector => {
        const quantity = selector.value;
        const price = selector.dataset.price;
        totalPrice += quantity * price;
        });

        // Mettre à jour le prix total affiché sur la page
        cartTotalPriceElement.innerText = totalPrice;
    }

    // Pour chaque sélecteur, ajouter un écouteur d'événement pour détecter les changements de sélection et mettre à jour le prix total en conséquence
    quantitySelectors.forEach(selector => {
    selector.addEventListener('change', updateTotalPrice);
    });

    // Mettre à jour le prix total lorsque la page est chargée pour la première fois
    updateTotalPrice();
    </script>

    


</body>
<!-- <footer class="bot-nav">        
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
</footer> -->
</html>