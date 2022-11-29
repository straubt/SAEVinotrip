<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" >
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">    
    <link rel="stylesheet" href="css/over_image.css">
    <link rel="stylesheet" href="css/carte.css">
</head>
<header> 

<a href="/"><img id="logoSlogan" src="images/logo + slogan vinotrip.PNG"></a>
        <button id="route_des_vins" onclick="location.href='route-des-vins'">Route des vins</button>
       @guest <button id="loginButton" onclick="location.href='login'">Se Connecter</button>
        <button id="registerButton" onclick="location.href='register'">S'inscrire</button> @endguest
        @auth <button id="registerButton" onclick="location.href='logout'">Se déconnecter</button> @endauth
    </header>
<h1 id="titrePage">ROUTE DES VINS</h1>

<body> 

    <div class="map">
        <img id="carte" src="images/carte.png">   
        <div id="laRoute">
        <h1 id="title"></h1>
        <a href=""><img src="" alt="" onclick="" id="imageRoute"></a>
        <p id="descriptionRoute"></p>
    </div>
    </div>
    
</body>
<script>
var routes = <?php echo json_encode($route_des_vins);?>;
</script>
<script src="js/SpawnRoute.js">></script>

</html>