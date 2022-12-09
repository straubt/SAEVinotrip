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
            @guest<a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>@endguest
            @auth<a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>@endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>

    @if (Cart::content()->isNotEmpty())
    @foreach (Cart::content() as $sejour)
        <div class="parent">
        <div class="container">
        <img src="{{$sejour->model->photo_sejour}}" class="image">
        <div class="overlay">
        <div class="texte">
        {{$sejour->model->titre_sejour}} <br>
        {{$sejour->model->prix_min_individuel_sejour}} €
        <form action="{{route('cart.destroy', $sejour->rowId)}}" method="post">
        @csrf 
        @method('DELETE')
        <button type="submit">
        Remove
        </button>
        </form>
        </div>
        </div>
        </div>
        </div>
    @endforeach


    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
    @endif
    @else
    <p>Votre panier est vide</p>
    @endif

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