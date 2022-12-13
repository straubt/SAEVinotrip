<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Vinotrip</title> 
    <link rel="stylesheet" href="css/styleRegister.css">
	<link rel="stylesheet" href="css/styleGeneral.css">
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
            <?php if(auth()->guard()->guest()): ?><a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a><?php endif; ?>
            <?php if(auth()->guard()->check()): ?><a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a><?php endif; ?>
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img><?php echo e(count(Cart::content())); ?></a>
        <div>
    </header>
    <!-- Body of Form starts -->
		
  	<div class="container">
	  <h1>Se connecter</h1>
      <form method="post" action="<?php echo e(route("connectionPost")); ?>" autocomplete="on">
	  <?php echo csrf_field(); ?>
    		<!---Email ID---->
    		<div class="box">
          <label for="email" class="fl fontLabel"> Email : </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" required name="mail_client" placeholder="Email" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->


    		<!---Password------>
    		<div class="box">
          	<label for="password" class="fl fontLabel"> Mot de passe : </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="mdp_client" placeholder="Mot de passe" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->
			<br>
			<p style = "color: white; font-size: 12px">Mot de passe oublié ?</p>
    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="connexion">
    		</div>
    		<!---Submit Button----->
      </form>
	  
	   <?php $erreur = str_replace('email','',$errors);?> 
	   <p style="color: red; font-size: 12px"><?php echo e(preg_replace('/[^A-Za-z0-9\-]/', ' ', $erreur)); ?></p>
  </div>
  </body>
  
</html><?php /**PATH /home/poulje/SAEVinotrip/SAE/resources/views/connection.blade.php ENDPATH**/ ?>