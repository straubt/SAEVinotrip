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
        <link rel="stylesheet" href="css/styleSejour.css">
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