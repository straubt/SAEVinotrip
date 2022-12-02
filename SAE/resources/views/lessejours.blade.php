<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejour</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleLesSejours.css">
    <link rel="stylesheet" href="css/over_image.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
<body> 
    <script>
        var sejour = <?php echo json_encode($sejour);?>;
        var destination = <?php echo json_encode($destination);?>;
        var categorie_participant = <?php echo json_encode($categorie_participant);?>;
        var theme = <?php echo json_encode($theme);?>;
        var sejour_to_cat_participant = <?php echo json_encode($sejour_to_cat_participant);?>;
        <?php if(isset($_SERVER['QUERY_STRING'])){ ?>
        var domaine = <?php echo json_encode($_GET["Domaine"]);?>;
        var participant = <?php echo json_encode($_GET["Participant"]);?>;
        var theme = <?php echo json_encode($_GET["Theme"]);?>;
        <?php } ?>
    </script>
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


<?php

//filtres : 
if(isset($_SERVER['QUERY_STRING'])){
    $compteur = 0;

    if ($_GET['Domaine']!="NONE" && $_GET['Participant']=="NONE" && $_GET['Theme'] =="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($destination as $uneDestination)
        <?php if($uneDestination['libelle_destination'] == strtoupper($_GET['Domaine']) && $uneDestination['id_destination'] == $unSejour['id_destination']) { 
        ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php   $compteur++;} ?>
        @endforeach
        @endforeach  
        <?php 
    }
    if ($_GET['Domaine']=="NONE" && $_GET['Participant']!="NONE" && $_GET['Theme'] =="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($sejour_to_cat_participant as $uneCatToPart)
        @foreach ($categorie_participant as $uneCategorie)
        <?php if($uneCategorie['lib_categorie_participant'] == strtoupper($_GET['Participant']))
        { 
            if($uneCatToPart['id_categorie_participant'] == $uneCategorie['id_categorie_participant'] && $uneCatToPart['id_sejour'] == $unSejour['id_sejour']) 
            { 
        ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a><input type="checkbox"></input></div></div>
        <?php   $compteur++;}} ?>
        @endforeach
        @endforeach  
        @endforeach  
        <?php
    }
    if ($_GET['Domaine']=="NONE" && $_GET['Participant']=="NONE" && $_GET['Theme'] !="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($theme as $unTheme)
        <?php if($unTheme['libelle_theme'] == strtoupper($_GET['Theme']) && $unTheme['id_theme'] == $unSejour['id_theme']) { 
        ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php  $compteur++;}?>
        @endforeach
        @endforeach  
        <?php
    } 
    if ($_GET['Domaine']!="NONE" && $_GET['Participant']!="NONE" && $_GET['Theme'] =="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($destination as $uneDestination)
        @foreach ($sejour_to_cat_participant as $uneCatToPart)
        @foreach ($categorie_participant as $uneCategorie)
        <?php if($uneDestination['libelle_destination'] == strtoupper($_GET['Domaine']) && $uneDestination['id_destination'] == $unSejour['id_destination']) 
        { 
            if($uneCategorie['lib_categorie_participant'] == strtoupper($_GET['Participant']))
            {
                if($uneCatToPart['id_categorie_participant'] == $uneCategorie['id_categorie_participant'] && $uneCatToPart['id_sejour'] == $unSejour['id_sejour']) 
                {
        ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php  $compteur++;} }}?>
        @endforeach
        @endforeach  
        @endforeach
        @endforeach  
        <?php
    }    
    if ($_GET['Domaine']!="NONE" && $_GET['Participant']=="NONE" && $_GET['Theme'] !="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($destination as $uneDestination)
        @foreach ($theme as $unTheme)
        <?php if($uneDestination['libelle_destination'] == strtoupper($_GET['Domaine']) && $uneDestination['id_destination'] == $unSejour['id_destination']) { 
            if($unTheme['libelle_theme'] == strtoupper($_GET['Theme']) && $unTheme['id_theme'] == $unSejour['id_theme']) { 
            ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php   $compteur++;} }?>
        @endforeach
        @endforeach  
        @endforeach
        <?php
    }  
    if ($_GET['Domaine']=="NONE" && $_GET['Participant']!="NONE" && $_GET['Theme'] !="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($theme as $unTheme)
        @foreach ($sejour_to_cat_participant as $uneCatToPart)
        @foreach ($categorie_participant as $uneCategorie)
        <?php 
        if($uneCategorie['lib_categorie_participant'] == strtoupper($_GET['Participant']))
        {
            if($uneCatToPart['id_categorie_participant'] == $uneCategorie['id_categorie_participant'] && $uneCatToPart['id_sejour'] == $unSejour['id_sejour']) 
            {
            if($unTheme['libelle_theme'] == strtoupper($_GET['Theme']) && $unTheme['id_theme'] == $unSejour['id_theme']) { 
            ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php  $compteur++; } }}?>
        @endforeach
        @endforeach  
        @endforeach
        @endforeach
        <?php
    }      
    if ($_GET['Domaine']=="NONE" && $_GET['Participant']!="NONE" && $_GET['Theme'] !="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($theme as $unTheme)
        @foreach ($sejour_to_cat_participant as $uneCatToPart)
        @foreach ($categorie_participant as $uneCategorie)
        <?php 
        if($uneCategorie['lib_categorie_participant'] == strtoupper($_GET['Participant']))
        {
             if($uneCatToPart['id_categorie_participant'] == $uneCategorie['id_categorie_participant'] && $uneCatToPart['id_sejour'] == $unSejour['id_sejour']) 
             { 
            if($unTheme['libelle_theme'] == strtoupper($_GET['Theme']) && $unTheme['id_theme'] == $unSejour['id_theme']) { 
            ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php   $compteur++;}} }?>
        @endforeach
        @endforeach  
        @endforeach
        @endforeach
        <?php
    } 
    if ($_GET['Domaine']!="NONE" && $_GET['Participant']!="NONE" && $_GET['Theme'] !="NONE")
    {
        ?>
        @foreach ($sejour as $unSejour)
        @foreach ($destination as $uneDestination)
        @foreach ($theme as $unTheme)
        @foreach ($sejour_to_cat_participant as $uneCatToPart)
        @foreach ($categorie_participant as $uneCategorie)
        <?php if($uneDestination['libelle_destination'] == strtoupper($_GET['Domaine']) && $uneDestination['id_destination'] == $unSejour['id_destination']) 
        { 
        if($uneCategorie['lib_categorie_participant'] == strtoupper($_GET['Participant']))
        {
        if($uneCatToPart['id_categorie_participant'] == $uneCategorie['id_categorie_participant'] && $uneCatToPart['id_sejour'] == $unSejour['id_sejour']) 
        {            
        if($unTheme['libelle_theme'] == strtoupper($_GET['Theme']) && $unTheme['id_theme'] == $unSejour['id_theme']) 
        { 
            ?>
        <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
        <?php   $compteur++;}}}}?>
        @endforeach
        @endforeach  
        @endforeach
        @endforeach
        @endforeach
        <?php
    }           
        $selectdomaine = $_GET['Domaine'];
        $selectparticipant = $_GET['Participant'];
        $selecttheme = $_GET['Theme'];
    if($compteur == 0){
        echo "Désolé aucun séjour n'a été trouvé... ";
    }
}
else
{
    ?>
    @foreach ($sejour as $unSejour)
    <div class="parent"><div class = "container" data-aos="fade-up" ><a href="/sejour?{{$unSejour['id_sejour']}}"><img src="{{$unSejour['photo_sejour']}}" alt="" class="image"><div class = "overlay"><div class = "texte">{{$unSejour['titre_sejour']}}<br>{{$unSejour['prix_min_individuel_sejour']}}€ Par Pers.</div></div></a></div></div>
    @endforeach 
    <?php
}



?>
<script type="text/javascript">
var cb = document.querySelectorAll("[type=checkbox]"); // récupère tous les checkbox

var i = 0, // initialise i a 0
	  l = cb.length; // stocke le nombre de checkboxes

for (i; i<l; i++) // pour toutes les checkbox faire:
	cb[i].addEventListener("change", function (){ // ajouter un evenement  au changement de statut
        console.log(document.querySelectorAll(":checked"))
		if (document.querySelectorAll(":checked").length > 5) //si le nombre de checkbox check supp a 5 ? faire
			this.checked = false; //cb uncheck
	}, false); // faux ?
</script>
    
<script>
  AOS.init();
</script>
<script src="js/lesSejours.js" type="text/javascript"></script>
</body>
</html>

