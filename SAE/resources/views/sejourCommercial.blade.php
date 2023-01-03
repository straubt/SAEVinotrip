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
        <p>Connecté en tant que directeur commercial</p>

        <div class="menu">
            <a href="/welcomeAdmin">Séjours</a>
            <a href="/commandesEnAttente">Commandes en attente</a>
            <a href="/logout">Deconnexion</a>
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
                    <form method="POST" action="{{ route('modify-price') }}">   
                    @csrf
                    <label for="newPrice">Nouveau prix :</label><br>
                    <input type="hidden" name="tripId" value="{{$idRequest}}">
                    <input type="number" min="0" step="0.01" name="newPrice" value="{{$tripPrice}}"><br>
                    <input type="submit" value="Modifier">  
                    </form> 
                </div>
            </section>
    </body>
</html>