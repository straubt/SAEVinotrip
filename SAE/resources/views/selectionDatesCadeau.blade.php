<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection Cadeau</title>
    <link rel="stylesheet" href="css/styleRoute.css" >
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">    
    <link rel="stylesheet" href="css/over_image.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styleCadeau.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
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
<h1 id="titrePage">Sélectionnez vos dates !</h1>
<form action="" method="post">
    @csrf
    <label for="startDate">Date d'arrivée :</label><br>
    <input type="date" id="startDate" name="startDate" required><br>
    <label for="endDate">Date de départ :</label><br>
    <input type="date" id="endDate" name="endDate" required><br>
    <button type="submit">Valider</button>
</form>
<body> 

    
</body>


</html>