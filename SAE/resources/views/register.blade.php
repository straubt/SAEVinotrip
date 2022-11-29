<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Vinotrip</title> 
    <link rel="stylesheet" href="css/register.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleGeneral.css"></head>
<body>


<header> 
        <div id="headerButton">
            <button id="route_des_vins" onclick="location.href='route-des-vins'">Route des vins</button>
            <a href="/" title="Vinotrip">
                <img id="logoSlogan" src="images/logo + slogan vinotrip.PNG">
            </a>
            <button id="registerButton" onclick="location.href='register'">S'inscrire</button>
        </div>
</header>
    <!-- Body of Form starts -->

  	<div class="container">
      <form method="post" autocomplete="on">
        <!--First name-->
    		<div class="box">
          <label for="firstName" class="fl fontLabel"> ffv : </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="firstName" placeholder="Nom"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--First name-->


            <!--Second name-->
    		<div class="box">
          <label for="secondName" class="fl fontLabel"> Prénom : </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="secondName"
              placeholder="Prénom" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Second name-->


    		<!---Phone No.------>
    		<div class="box">
          <label for="phone" class="fl fontLabel"> Numéro de téléphone : </label>
    			<div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="phoneNo" maxlength="10" placeholder="Numéro de téléphone" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Phone No.---->


    		<!---Email ID---->
    		<div class="box">
          <label for="email" class="fl fontLabel"> Email : </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" required name="email" placeholder="Email" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->


    		<!---Password------>
    		<div class="box">
          <label for="password" class="fl fontLabel"> Mot de passe : </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="password" placeholder="Mot de passe" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->

    		<!---Gender----->
    		<div class="box radio">
          <label for="gender" class="fl fontLabel"> Genre: </label>
    				<input type="radio" name="Gender" value="Male" required> Homme &nbsp; &nbsp; &nbsp; &nbsp;
    				<input type="radio" name="Gender" value="Female" required> Femme
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
      </form>
  </div>
  </body>
</html>