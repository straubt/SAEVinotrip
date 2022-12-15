<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Vinotrip</title> 
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
            @guest<a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>@endguest
            @auth<a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>@endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>

    <!-- Body of Form starts -->
		<div class="container">
		<h1>S'inscrire</h1>

			<form method="post" autocomplete="on" action="{{ route('registerPost') }}">
				@csrf
				<!--First name-->
				<div class="box">
					<label for="firstName" class="fl fontLabel"> nom : 
					</label>
					<div class="new iconBox">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
					<div class="fr">
						<input type="text" name="nom" placeholder="Nom"
						class="textBox" autofocus="on" required>
					</div>
					<div class="clr">
					</div>
				</div>
					<!--First name-->


					<!--Second name-->
				<div class="box">
					<label for="secondName" class="fl fontLabel"> Prénom : 
					</label>
					<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true">
						</i>
					</div>
					<div class="fr">
						<input type="text" required name="prenom"
						placeholder="Prénom" class="textBox">
					</div>
					<div class="clr">
					</div>
				</div>
					<!--Second name-->



					<!---Email ID---->
				<div class="box">
					<label for="email" class="fl fontLabel"> Email : 
					</label>
					<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true">
						</i>
					</div>
					<div class="fr">
						<input type="email" required name="mail_client" placeholder="Email" class="textBox">
					</div>
					<div class="clr">
					</div>
				</div>
				
				<div class="box">
					<label for="dte_naiss" class="fl fontLabel"> Date naissance : 
					</label>
					<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true">
						</i>
					</div>
					<div class="fr">
						<input type="date" required name="date_naissance" placeholder="Date de naissance" class="textBox">
					</div>
					<div class="clr">
					</div>
				</div>


					<!---Password------>
					<div class="box">
						<label for="password" class="fl fontLabel"> *Mot de passe : 
						</label>
						<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true">
							</i>
						</div>
						<div class="fr">
							<input type="Password" required name="mdp" placeholder="Mot de passe" class="textBox" pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[$@#!%*?&])[A-Za-z\d$@#!%*?&]{8,}$">
						</div>
						<div class="clr">
						</div>
					</div>
					<!---Password---->
					<p>*Votre mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial</p>

					<!---Gender----->
				<div class="box radio">
					<label for="gender" class="fl fontLabel" id="genre"> Genre: 
					</label>
					<input type="radio" name="titre" value="M" required> Homme &nbsp; &nbsp; &nbsp; &nbsp;
					<input type="radio" name="titre" value="Mme" required> Femme &nbsp; &nbsp; &nbsp; &nbsp;
					<input type="radio" name="titre" value="Mlle" required> Mademoiselle
				</div>
					<!---Gender--->


					<!--Terms and Conditions------>
				<div class="box terms">
					<input type="checkbox" name="Terms" required> &nbsp; J'accepte les termes et les conditions
				</div>
					<!--Terms and Conditions------>


					<!---Submit Button------>
				<div class="box" style="background: #2d3e3f">
					<input type="Submit" name="Submit" class="submit" value="S'inscrire">
				</div>
				<!---Submit Button----->
				</input>
				@if ($errors->any())
    				<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
    				</div>
				@endif
			</form>
		</div>
		<script>
			let form = document.querySelector("form");
			console.log(form);
		</script>
	</body>
</html>