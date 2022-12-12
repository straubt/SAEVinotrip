<?php use Gloudemans\Shoppingcart\Facades\Cart; ?>

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
            <?php if(auth()->guard()->guest()): ?><a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a><?php endif; ?>
            <?php if(auth()->guard()->check()): ?><a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a><?php endif; ?>
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img><?php echo e(count(Cart::content())); ?></a>
        <div>
    </header>

    <h1>Votre panier</h1>
    <a href="/videpanier"><button class="btn1">Tout supprimer</button></a>

    <?php if(Cart::content()->isNotEmpty()): ?>
  <div class="cart">
    <div class="cart-header">
      <h3>Your Cart</h3>
      <p><?php echo e(Cart::count()); ?> items</p>
    </div>

    <div class="cart-items">
      <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="cart-item">
          <img src="<?php echo e($item->model->photo_sejour); ?>" alt="<?php echo e($item->model->titre_sejour); ?>">
          <div class="cart-item-details">
            <h4><?php echo e($item->model->titre_sejour); ?></h4>
            <p><?php echo e($item->model->prix_min_individuel_sejour); ?> €</p>

            <!-- Ajouter un sélecteur pour choisir le nombre de personnes -->
            <select class="cart-item-quantity" data-price="<?php echo e($item->model->prix_min_individuel_sejour); ?>">
              <option value="1">1 person</option>
              <option value="2">2 people</option>
              <option value="3">3 people</option>
              <option value="4">4 people</option>
            </select>
            </div>
            <p class="cart-item-remove">
            <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit">Remove</button>
            </form>
            </p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Ajouter un élément pour afficher le prix total mis à jour en temps réel -->
            <div class="cart-total">
            <p>Total: <span id="cart-total-price"><?php echo e(Cart::total()); ?></span> €</p>
            </div>

            <div class="cart-actions">
            <a href="/paiement"><button>Checkout</button></a>
            </div>
            </div>
    <?php else: ?>
    <p>Your cart is empty.</p>
    <?php endif; ?>
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
</html><?php /**PATH /home/poulje/SAEVinotrip/SAE/resources/views/panier.blade.php ENDPATH**/ ?>