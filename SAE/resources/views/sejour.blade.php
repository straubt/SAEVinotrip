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
        <link rel="stylesheet" href="css/styleGeneral.css"></head>
        <link rel="stylesheet" href="css/sejour.css">
    </head>
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

<script>
  AOS.init();
</script>
</body>
</html>