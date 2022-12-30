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
$idRequest = $_SERVER['QUERY_STRING'];

$PORT_SERVEUR_IMG = '8232';

$tripTitle = $sejour[$id]['titre_sejour'];
$tripPrice = $sejour[$id]['prix_min_individuel_sejour'];
$tripNbDay = $sejour[$id]['duree_sejour'];
$tripPrice = $sejour[$id]['prix_min_individuel_sejour'];
$tripDescription = $sejour[$id]['description_sejour'];
$tripPicture = 'http://51.83.36.122:' . $PORT_SERVEUR_IMG . '/sejours/' . $sejour[$id]['photo_sejour'];
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
            <a href="/nos-sejours">Nos séjours</a>
            <a href="/route-des-vins">Routes des vins</a>
            @guest<a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>@endguest
            @auth<a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>@endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <main>
            <section id="sejourHeader" class="flexResponsive">
                <img src="{{$tripPicture}}" alt="photo séjour">
                <div id="sejourHeaderText">
                    <h1>{{$tripTitle}}</h1>
                    <p>{{$tripPrice}}€ minimum par personne (peut varier en fonction des options choisies)</p>
                    <p>{{$tripNbDay}} jour(s) | {{$tripNbDay-1}} nuit(s)</p>
                    <p class="justified">{{$tripDescription}}</p>
                    <p>{{$themeLibelle}}</p>
                    <button onClick="window.location.href='/offrir-sejour/{{$idRequest}}'">
                        <div>Offrir</div>
                        <img src="/images/icons/offer.svg"></img>
                    </button>
                    <form action="{{ route('cart.store') }}" method="post" onsubmit="return validateDates()">
                        @csrf
                        <input type="hidden" name="id" value="{{$idRequest}}">
                        <input type="hidden" name="title" value="{{$tripTitle}}">
                        <input type="hidden" name="price" value="{{$tripPrice}}">
                        <label for="startDate">Date d'arrivée :</label><br>
                        <input type="date" id="startDate" name="startDate" required><br>
                        <label for="endDate">Date de départ :</label><br>
                        <input type="date" id="endDate" name="endDate" required><br>
                    <button type="submit">
                        <div>Ajouter au<br> panier</div>
                        <img src="/images/icons/shoppingCart.svg"></img>
                    </button>
                    </form>
                </div>
            </section>

            <section id="sejourProgramme">
                <h2>Le programme de votre séjour</h2>
            <?php
                foreach($etapes as $etape)
                {
                    echo("
                        <h3>$etape->titre_etape</h3>
                        <div class=\"etape flexResponsive\">
                            <img src=\"http://51.83.36.122:$PORT_SERVEUR_IMG/etapes/$etape->photo_etape\" alt=\"photo de l'étape\">
                            <div>
                                <p class=\"justified\">$etape->description_etape</p>
                                <p><a href=\"$etape->url_video_etape\">L'étape en vidéo</a></p>
                                <p><a href=\"$etape->url_etape\">L'étape en détail</a></p>
                            </div>
                        </div>");
                }
            ?>
            </section>
            
            <section id="sejourAvis">

                <div id="avisHeader">
                    <h2>Les avis</h2>
                    @auth<button id="openReviewForm" onclick="unhideFormLeaveReview()">Laissez le vôtre !</button>@endauth
                    @guest<button id="openReviewForm" onclick="alert('Vous devez être authentifié pour laisser un avis')">Laissez le vôtre !</button>@endguest
                </div>

                <form id="formLeaveReview" action="sejour" method="post" hidden>
                    @csrf
                    <h3>Mon avis</h3>

                    <div class="flexResponsive">
                        <div class="flexResponsive" id="noteContainer">
                            <label for="noteAvis">Note</label>
                            <input type="range" min="1" max="5" list="tickmarks" name="noteAvis" id="formAvisSejourNote" required>
                            <datalist id="tickmarks"><option value="1" label="1"></option><option value="2" label="2"></option><option value="3" label="3"></option><option value="4" label="4"></option><option value="5" label="5"></option></datalist>
                        </div>
                        <div class="flexResponsive" id="libelleContainer">
                            <label for="libelleAvis">Titre</label>
                            <input type="text" name="libelleAvis" id="formAvisSejourLibelle" required>
                        </div>
                    </div>

                    <div>
                        <label for="texteAvis">Commentaire :</label><br>
                        <textarea name="texteAvis" id="formLeaveReviewTextArea" required></textarea>
                    </div>

                    <div id="formLeaveReviewControlContainer">
                        <input type="submit" value="Envoyer !" onclick="AJAXSubmit(document.getElementById('formLeaveReview'))">;
                        <button type="button" id="closeReviewForm" onclick="hideFormLeaveReview()">Fermer</button>
                    </div>

                    <input type="hidden" id="idSejour" name="idSejour" value="<?=$id+1?>"/>

                </form>

                <div id="avisData" class="flexResponsive">
                    <div>
                        Note moyenne : <?php echo($avisData[0]->average_note);?>
                    </div>
                    <div>
                        Nombre d'avis : <?php echo($avisData[0]->count_avis);?>
                    </div>
                </div>
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
            </section>
        </main>
    </body>
    <script>
function validateDates() {
  // Récupérer les valeurs des champs de saisie de date
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;

  // Convertir les valeurs en objets Date
  var startDateObject = new Date(startDate);
  var endDateObject = new Date(endDate);

  // Récupérer la date actuelle
  var currentDate = new Date();

  // Vérifier que la date de départ est supérieure à la date actuelle
  if (startDateObject < currentDate) {
    alert("La date de départ doit être supérieure à la date actuelle !");
    return false;
  }

  // Vérifier que la date d'arrivée est supérieure à la date actuelle
  if (endDateObject < currentDate) {
    alert("La date d'arrivée doit être supérieure à la date actuelle !");
    return false;
  }

  // Vérifier que la date de départ est inférieure à la date d'arrivée
  if (startDateObject > endDateObject) {
    alert("La date de départ doit être inférieure à la date d'arrivée !");
    return false;
  }

  // Si les dates sont valides, soumettre le formulaire
  return true;
}



    </script>
</html>