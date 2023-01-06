<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil vinotrip Main</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleLesSejours.css">
    <link rel="stylesheet" href="css/over_image.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>

<body>
<script>
        var sejour = <?php echo json_encode($sejour);?>;
        var destination = <?php echo json_encode($destination);?>;
        var categorie_participant = <?php echo json_encode($categorie_participant);?>;
        var lesThemes = <?php echo json_encode($theme);?>;
        var sejour_to_cat_participant = <?php echo json_encode($sejour_to_cat_participant);?>;
        <?php if(isset($_SERVER['QUERY_STRING'])){ ?>
        var domaine = <?php echo json_encode($_GET["Domaine"]);?>;
        var participant = <?php echo json_encode($_GET["Participant"]);?>;
        var theme = <?php echo json_encode($_GET["Theme"]);?>;
        <?php } 
        else {?> domaine = "";
            participant = "";
            theme = "";
        <?php } ?>
    </script>
    <header class="top-nav">
        <p>Connecté en tant que directeur commercial</p>

        <div class="menu">
            <a href="/welcomeAdmin">Séjours</a>
            <a href="/commandesEnAttente">Commandes en attente</a>
            <a href="/logout">Deconnexion</a>
        <div>
    </header>
    <script src="js/select.js"></script>
    <?php 
    $selectdomaine = "";
    $selectparticipant = "";
    $selecttheme = "";
    $textDomaine = "";
    $textParticipant = "";
    $textTheme = "";
    if(!isset($_SERVER['QUERY_STRING'])){
        $selectdomaine="NONE";
        $selectparticipant="NONE";
        $selecttheme="NONE";
    }
    if(isset($_SERVER['QUERY_STRING'])){
        $selectdomaine = $_GET['Domaine'];
        $selectparticipant = $_GET['Participant'];
        $selecttheme = $_GET['Theme'];
    }
    if($selectdomaine=="NONE"){
        $textDomaine=str_replace ('_', ' ', "--Quelle_Destination_?--");;
    }
    else{
        $textDomaine = str_replace ('_', ' ', $selectdomaine); 
    }
    if($selectparticipant=="NONE"){
        $textParticipant=str_replace ('_', ' ', "--Pour_Qui_?--");;
    }
    else{
        $textParticipant = str_replace ('_', ' ', $selectparticipant); 
    }
    if($selecttheme=="NONE"){
        $textTheme=str_replace ('_', ' ', "--Envie_Particulière_?--");;
    }   
    else{
        $textTheme = str_replace ('_', ' ', $selecttheme); 
    }
    ?>
<form method="get">
    <label for="selector" id="marge"></label>
    <select name="Domaine" id="selector">
        <option value={{$selectdomaine}}>{{$textDomaine}}</option>
        <option value="NONE">Aucun filtre</option>
        <option value="Bourgogne">Bourgogne</option>
        <option value="Valee_du_Rhone">Valée du rhône</option>
        <option value="Bordeaux">Bordeaux</option>
        <option value="Champagne">Champagne</option>
        <option value="Alsace">Alsace</option>
        <option value="Languedoc-Roussillon">Languedoc-Roussillon</option>
        <option value="Val_de_Loire">Val de Loire</option>
        <option value="Beaujolais">Beaujolais</option>
        <option value="Paris">Paris</option>
        <option value="Sud-Ouest">Sud-Ouest</option>
        <option value="Provence">Provence</option>
        <option value="Catalogne">Catalogne</option>
        <option value="Jura">Jura</option>
        <option value="Corse">Corse</option>
        <option value="Savoie">Savoie</option>
    </select>
    <select name="Participant" id="selector">
        <option value={{$selectparticipant}}>{{$textParticipant}}</option>
        <option value="NONE">Aucun filtre</option>
        <option value="En_Couple">En couple</option>
        <option value="En_Famille">En famille</option>
        <option value="Entre_Amis">Entre Amis</option>
    </select>
    <select name="Theme" id="selector">
        <option value={{$selecttheme}}>{{$textTheme}}</option>
        <option value="NONE">Aucun filtre</option>
        <option value="Bien-Être">Bien etre</option>
        <option value="Culture">Culture</option>
        <option value="Gastronomie">Gastronomie</option>
        <option value="Sport">Sport</option>
    </select>
    <input type="submit" value="confirmer" id="buttonConfirmer">
</form>

<script src="js/lesSejoursCommercial.js" type="text/javascript"></script>
<script src="js/transition.js" type="text/javascript"></script>
</body>

<!-- <footer class="bot-nav">        
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
</footer> -->
<script src="../js/mainPageAcceuil.js"></script>
<script src="js/jquery-3.6.1.slim.min.js"></script>
<script src="js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/caroussel.js"></script>

</html>