<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil vinotrip Main</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
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
            <a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>
        <div>
    </header>
<body>
    <script> 
        var admins = <?php echo json_encode($admins);?>;
        var catStaff = <?php echo json_encode($catStaff);?>;
        var commandes = <?php echo json_encode($commandes);?>;
        var csrf = <?php echo json_encode(csrf_token());?>;
    </script>
    <p><b>page d'aceuil Chef</b></p> 
    <p><br><b>Ajout d'un nouvel administrateur :</b></br></p>
    <form method="post" action="{{ route("addAdmin") }}" autocomplete="on">
	  @csrf

    		<!---NOM Admin---->
    		<div class="box">
          <label for="id" class="fl fontLabel"> Nom : </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="id" required name="nom_staff" placeholder="NOM" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
            <!---Prenom Admin---->
    		<div class="box">
          <label for="id" class="fl fontLabel"> Prénom : </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="id" required name="prenom_staff" placeholder="Prénom" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
            <!---Categorie Admin---->
    		<label for="selector" id="marge">Fonction</label>
            <select name="type_admin" id="selector">
                <option value=2>directeur service vente</option>
                <option value=3>membre service vente</option>
                <option value=4>directeur service client</option>
                <option value=5>membre service client</option>
            </select>

    		<!---Password------>
    		<div class="box">
          	<label for="password" class="fl fontLabel"> Mot de passe : </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="mdp_admin" placeholder="Mot de passe" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>

    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="ajouter">
    		</div>
      </form>
    <p class="admins"><br><b>Administrateurs existants</b></br></p>
    <p class="commandes"><br><b>Statistiques</b></br></p>

</body>
<footer class="bot-nav">        
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
</footer>
<script src="../js/mainPageAcceuil.js"></script>
<script src="js/jquery-3.6.1.slim.min.js"></script>
<script src="js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/caroussel.js"></script>
<script src="js/welcomeChef.js"></script>
</html>