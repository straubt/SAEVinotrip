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
    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sejour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="parent">
        <div class="container">
        <img src="<?php echo e($sejour->model->photo_sejour); ?>" class="image">
        <div class="overlay">
        <div class="texte">
        <?php echo e($sejour->model->titre_sejour); ?> <br>
        <?php echo e($sejour->model->prix_min_individuel_sejour); ?> €
        <form action="<?php echo e(route('cart.destroy', $sejour->rowId)); ?>" method="post">
        <?php echo csrf_field(); ?> 
        <?php echo method_field('DELETE'); ?>
        <button type="submit">
        Remove
        </button>
        </form>
        </div>
        </div>
        </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

    <?php endif; ?>
    <?php else: ?>
    <p>Votre panier est vide</p>
    <?php endif; ?>

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