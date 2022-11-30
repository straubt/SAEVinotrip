<?php 
$id = $_SERVER['QUERY_STRING']-1;
$tripTitle = $sejour[$id]['titre_sejour'];
$tripNbDay = $sejour[$id]['duree_sejour'];
$tripDescription = $sejour[$id]['description_sejour'];
$tripPicture = $sejour[$id]['photo_sejour'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$tripTitle}}</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
        <link rel="stylesheet" href="css/sejour.css">
        <style type="text/css">
            .top-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  background-color: #7E0000DE;
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  color: #FFF;

  padding: 1em;
  border-bottom: solid white;
}

.top-nav a{
    color: white;
    text-decoration: none;
}
.menu {
  display: flex;
  flex-direction: row;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu > a {
  margin: 0 1rem;
  overflow: hidden;
}

.menu-button-container {
  display: none;
  height: 100%;
  width: 30px;
  cursor: pointer;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#menu-toggle {
  display: none;
}

.menu-button,
.menu-button::before,
.menu-button::after {
  display: block;
  background-color: #fff;
  position: absolute;
  height: 4px;
  width: 30px;
  transition: transform 400ms cubic-bezier(0.23, 1, 0.32, 1);
  border-radius: 2px;
}

.menu-button::before {
  content: '';
  margin-top: -8px;
}

.menu-button::after {
  content: '';
  margin-top: 8px;
}

#menu-toggle:checked + .menu-button-container .menu-button::before {
  margin-top: 0px;
  transform: rotate(405deg);
}

#menu-toggle:checked + .menu-button-container .menu-button {
  background: rgba(255, 255, 255, 0);
}

#menu-toggle:checked + .menu-button-container .menu-button::after {
  margin-top: 0px;
  transform: rotate(-405deg);
}

@media (max-width: 700px) {
  .menu-button-container {
    display: flex;
  }
  .menu {
    position: absolute;
    top: 0;
    margin-top: 50px;
    left: 0;
    flex-direction: column;
    width: 100%;
    justify-content: center;
    align-items: center;
  }
  #menu-toggle ~ .menu a {
    height: 0;
    margin: 0;
    padding: 0;
    border: 0;
    transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
  }
  #menu-toggle:checked ~ .menu a {
    border: 1px solid #333;
    height: 2.5em;
    padding: 0.5em;
    transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
  }
  .menu > a {
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 0.5em 0;
    width: 100%;
    color: white;
    background-color: #222;
  }

  /* mettre une ligne en dessous de chaque élément du menu, sauf le dernier */
  .menu > a:not(:last-child) {
    border-bottom: 1px solid #444;
  }
}
        </style>
    </head>
    <body>
        <!--
    <header> 
        <div id="headerButton">
            <button id="route_des_vins" onclick="location.href='route-des-vins'">Route des vins</button>
            <button id="registerButton" onclick="location.href='register'">S'inscrire</button>
        </div>
</header>-->
        <header class="top-nav">
            <a href="/">Vinotrip</a>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>
            <div class="menu">
                <a href="/">Accueil</a>
                <a>Routes des vins</a>
                <a>Three</a>
                <a>Four</a>
                <a>S'inscrire / se connecter</a>
            <div>
        </header>
        <main>
            <div id="sejourHeader">
                <img src="{{$tripPicture}}" alt="photo séjour">
                <div id="sejourHeaderText">
                    <h1>{{$tripTitle}}</h1>
                    <p>{{$tripNbDay}} jour(s) | {{$tripNbDay-1}} nuit(s)</p>
                    <p class="justified">{{$tripDescription}}</p>
                    <p>{{$theme[$sejour[$id]['id_theme']-1]['libelle_theme']}}</p>
                    <button>
                        <div>Offrir</div>
                        <img src="/images/icons/shoppingCart.svg"></img>
                    </button>
                    <button>
                        <div>Ajouter au<br> panier</div>
                        <img src="/images/icons/offer.svg"></img>
                    </button>
                </div>
            </div>

            <div id="sejourProgramme">
                <?php 
                $idexist = "";
                $commentaire = "";
                if(isset($avis[$sejour[$id]['id_sejour']-1]['note_avis']))
                {
                    $idexist = $avis[$sejour[$id]['id_sejour']-1]['note_avis']/5;
                    $commentaire = $avis[$sejour[$id]['id_sejour']-1]['libelle_avis'];
                }
                else
                {
                    $idexist = "Aucun avis n'a été publié pour l'instant";
                    $commentaire = "Aucun commentaire n'a été publié pour l'instant";
                }
                ?>
                <p>Avis = {{$idexist}}</p>
                <p>Commentaire = {{$commentaire}}</p>
            </div>
        </main>
    </body>
</html>