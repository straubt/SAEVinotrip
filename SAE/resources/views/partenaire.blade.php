<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$partenaire->nom_partenaire}}</title>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="icon" type="image/x-icon" href="images/images.jpg">
        <!-- <script src="js/unSejour.js"></script> -->
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
            @guest
            <a href="/register">S'inscrire</a>
            <a href="/login">Se connecter</a>
            @endguest
            @auth
            <a href="/profile">Mon profil</a>
            <a href="/logout">Deconnexion</a>
            @endauth
            <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img>{{count(Cart::content())}}</a>
        <div>
    </header>
        <main>
            <section>
                <h1>{{$partenaire->nom_partenaire}}</h1>
                <p>{{$partenaire->num_rue_adresse . ' ' . $partenaire->libelle_rue_adresse . ' ' . $partenaire->code_postal_adresse . ' ' . $partenaire->libelle_commune}}</p>
                <p>{{$partenaire->mail_partenaire}}</p>
                <p>0{{$partenaire->tel_partenaire}}</p>
            </section>

            <section>
                <?php
                $html = "";
                if ($partenaire->nb_etoile_restaurant)
                {
                    $html .= '<h2>Restaurant</h2>';
                    $html .= '<p>Epoustouflez vos papilles en venant déguster un repas dans ce superbe restaurant ' . $partenaire->nb_etoile_restaurant . ' étoiles</p>';
                    $html .= '<p>Vous découvrirez ou redécouvrirez la cusine ' . $partenaire->type_cuisine . ' et aurez l\'occasion de goûter à la spécialité du restaurant : ' . $partenaire->specialite_restaurant . '</p>';
                }
                echo($html);
                ?>
            </section>

            <section>
                <?php
                $html = "";
                if ($partenaire->type_degustation)
                {
                    $html .= '<h2>Cave</h2>';
                    $html .= 'Laissez vous guider pendant la visite de ' . $partenaire->nom_partenaire . ' et achevez votre escapade oenologique en participant à une dégustation ' . $partenaire->type_degustation . '</p>';
                }
                echo($html);
                ?>
            </section>

            <section>
                <?php
                $html = "";
                if ($partenaire->nb_etoile_hotel)
                {
                    $html .= '<h2>Hotel</h2>';
                    $html .= 'Installez vous dans une des ' . $partenaire->nb_chambre_hotel . ' chambres de ' . $partenaire->nom_partenaire . ' et profitez d\'une nuit paisible dans un hébergement ' . $partenaire->nb_etoile_hotel . ' étoiles</p>';
                }
                echo($html);
                ?>
            </section>

            <section>
            <?php
                $html = "";
                if ($partenaire->type_activite)
                {
                    $html .= '<h2>Activité</h2>';
                    $html .= 'Divertissez vous en participant à ' . $partenaire->type_activite . ' vers ' . $partenaire->lieu_activite . '</p>';
                }
                echo($html);
                ?>
            </section>
        </main>
    </body>
</html>