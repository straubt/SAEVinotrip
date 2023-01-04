<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Vinotrip</title> 
    <link rel="stylesheet" href="css/styleRegister.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
	<link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
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
			<a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img></a>
		<div>
	</header>
    <!-- Body of Form starts -->
		
  	<div class="container">
		<h1 class="titre">Se connecter en Chef</h1>
      <form method="post" action="{{ route("connectionChefPost") }}" autocomplete="on">
	  @csrf

    		<!---ID Admin---->
    		<div class="box">
          <label for="id" class="fl fontLabel"> ID : </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="id" required name="id_admin" placeholder="Id" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>

    		<!---Password------>
    		<div class="box">
          	<label for="password" class="fl fontLabel"> Mot de passe : </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="mdp_admin" placeholder="Mot de passe" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>

			<!---Aide Chef---->
			<br>
			<a class="lien" href="/adminAide">Besoin d'aide</a>

    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="connexion">
    		</div>


			<!---connection temporaire---->
			<br>
			<a class="temp" href="/welcomeChef">connexion temporaire</a>


			<!---autre connection----->
			<div class="autreConection">
				<a class="lien" href="/login"> User </a>
				<a class="lien" href="/connectionAdmin"> Admin </a>
				<a class="selected"> Chef </a>
				<a class="lien" href="/"> Accueil </a>
    		</div>
      </form>
	  
	   <?php $erreur = str_replace('email','',$errors);?> 
	   <p style="color: red; font-size: 12px">{{preg_replace('/[^A-Za-z0-9\-]/', ' ', $erreur)}}</p>
  </div>
  </body>
  
</html>