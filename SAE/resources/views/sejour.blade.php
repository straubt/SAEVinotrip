<?php
use Illuminate\Support\Facades\DB;  // utile pour effectuer des requêtes SQL

$id = $_SERVER['QUERY_STRING']-1;

$avis = DB::table('avis')
            ->join('sejour', 'sejour.id_sejour', '=', 'avis.id_sejour')
            ->join('client', 'client.id_client', '=', 'avis.id_client')
            ->where('avis.id_sejour', $id + 1)
            ->select('nom_client', 'prenom_client', 'note_avis', 'libelle_avis', 'texte_avis')
            ->get();

$tripTitle = $sejour[$id]['titre_sejour'];
$tripNbDay = $sejour[$id]['duree_sejour'];
$tripDescription = $sejour[$id]['description_sejour'];
$tripPicture = $sejour[$id]['photo_sejour'];
$themeLibelle = $theme[$sejour[$id]['id_theme']-1]['libelle_theme'];
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
                <a href="/route-des-vins">Routes des vins</a>
                <a href="/register">S'inscrire / se connecter</a>
            <div>
        </header>
        <main>
            <section id="sejourHeader">
                <img src="{{$tripPicture}}" alt="photo séjour">
                <div id="sejourHeaderText">
                    <h1>{{$tripTitle}}</h1>
                    <p>{{$tripNbDay}} jour(s) | {{$tripNbDay-1}} nuit(s)</p>
                    <p class="justified">{{$tripDescription}}</p>
                    <p>{{$themeLibelle}}</p>
                    <button>
                        <div>Offrir</div>
                        <img src="/images/icons/offer.svg"></img>
                    </button>
                    <button>
                        <div>Ajouter au<br> panier</div>
                        <img src="/images/icons/shoppingCart.svg"></img>
                    </button>
                </div>
            </section>

            <section id="sejourProgramme">
            </section>

            <section id="sejourAvis">
                <h2>Les avis</h2>
                <?php
                foreach($avis as $a)
                {
                    $htmlAvis = "
                        <div class=\"avis\">
                            <div class=\"avisHeader\">
                                <div class=\"avisHeaderLine1\">
                                    $a->note_avis  $a->libelle_avis
                                </div>
                                <div class=\"avisHeaderLine1\">
                                    $a->nom_client $a->prenom_client Date
                                </div>
                            </div>
                            <p class=\"avisText\">
                                $a->texte_avis
                            </p>
                        </div>
                            ";
                    echo($htmlAvis);
                }
                ?>
            </section>
        </main>
    </body>
</html>