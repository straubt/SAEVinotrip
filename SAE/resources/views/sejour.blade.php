<?php
use Illuminate\Support\Facades\DB;  // utile pour effectuer des requêtes SQL

// returns HTML structure for a 5 dot rating system
function buildRatingDots($note){
    if ($note < 1 || $note > 5)
        throw new Exception("Note non valide");

    $html = "";

    for ($i = 0; $i < 5; $i++)
    {
        if ($note > 0)
        {
            $note--;
            $html.= "<span class=\"ratingDot ratingDotChecked\"></span>";
        }
        else
            $html.= "<span class=\"ratingDot\"></span>";
    }

    return $html;
}

$id = $_SERVER['QUERY_STRING']-1;

$avis = DB::table('avis')
            ->join('sejour', 'sejour.id_sejour', '=', 'avis.id_sejour')
            ->join('client', 'client.id_client', '=', 'avis.id_client')
            ->where('avis.id_sejour', $id + 1)
            ->select('nom_client', 'prenom_client', 'note_avis', 'libelle_avis', 'texte_avis', 'date_avis')
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
        <script src="js/unSejour.js"></script>
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
                <div id="avisHeader">
                    <h2>Les avis</h2>
                    <button id="openReviewForm" onclick="openOrCloseFormLeaveReview()">Laissez le vôtre !</button>
                </div>
                <form id="formLeaveReview" action="" method="get" hidden>
                    <h3>Mon avis</h3>
                    <div>
                        <label for="note">Note :</label>
                        <input type="range" min="1" max="5" list="tickmarks" name="note" id="formAvisSejourNote" required>
                        <datalist id="tickmarks">
                            <option value="1" label="1"></option>
                            <option value="2" label="2"></option>
                            <option value="3" label="3"></option>
                            <option value="4" label="4"></option>
                            <option value="5" label="5"></option>
                        </datalist>
                    </div>
                    <div>
                        <label for="libelle">Titre :</label>
                        <input type="text" name="libelle" id="formAvisSejourLibelle" required>
                    </div>
                    <div>
                        <label for="texte">Commentaire :</label><br>
                        <textarea name="texte" id="formAvisSejourTexte" required></textarea>
                    </div>
                    <div>
                        <input type="submit" value="Envoyer !">
                    </div>
                </form>
                <?php
                $i = 0;
                $hidden = "";
                foreach($avis as $a)
                {
                    if ($i >= 5)
                        $hidden = "hidden"; 
                    $i++;
                    $htmlAvis = "
                        <div class=\"avis\" $hidden>
                            <div class=\"avisHeader\">
                                <div class=\"ratingContainer\">".
                                    buildRatingDots($a->note_avis)
                                ."</div>
                                <h3>$a->libelle_avis</h3> 
                            </div>
                            <p class=\"avisText justified\">$a->texte_avis</p>
                            <p class=\"avisSignature\">$a->nom_client $a->prenom_client $a->date_avis</p>
                        </div>
                            ";
                    echo($htmlAvis);
                }
                // if more than 5 comment, show a button to see more comment
                if ($i > 5)
                    echo("<button id=\"btnAvisHiding\" onclick=\"unHideAvis()\">Voir plus d'avis</button>");
                ?>
                <button id="btnStickyAvisHiding" onclick="hideAvis()" hidden>Voir moins d'avis</button>
            </section>
        </main>
    </body>
</html>