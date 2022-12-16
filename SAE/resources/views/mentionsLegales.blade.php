<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mentions legales</title>
    <link rel="stylesheet" href="css/styleMentions.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>
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
        <a href="/panier" ><img id="panier" src="https://cdn.discordapp.com/attachments/1043098033778348072/1048247684949082143/panierBlanc.png"></img></a>
    <div>
</header>

<body>

    <h1>Mentions légales</h1>

    <h2>Editeur</h2>

    <p>Ce site est édité par VINOTRIP S.A.S., société par actions simplifiée au capital de 30.000€, inscrite au registre du commerce
        et des sociétés de Paris sous le numéro 792 620 262 (code APE 7911Z), dont le siège social est situé au 14 rue Hermel, 
        75018 Paris. VINOTRIP S.A.S. est titulaire du certificat d’Immatriculation Atout France IM075130039 et est assurée auprès 
        de HISCOX - Assurance RCP contrat n°HA RCP0232580 (tous dommages confondus à hauteur de 1 500 000 €). <br>La direction de 
        la publication est assurée par Adrien Mirguet en sa qualité de Président de VINOTRIP S.A.S. et Julien Plaud en sa qualité 
        de Directeur Général de VINOTRIP S.A.S..</p>

    <h2>Propriété intellectuelle</h2>

    <p>Toute représentation totale ou partielle de ce site ou de son contenu (structure générale, textes, sons, logos, images 
        animées ou non), par quelques procédés que se soit, sans autorisation préalable et express de VINOTRIP S.A.S. est interdite 
        et constituerait une contrefaçon sanctionnée par le code de la Propriété Intellectuelle.</p>

    <h2>Données personnelles</h2>

    <p>Les informations recueillies font l’objet d’un traitement informatique destiné à VINOTRIP S.A.S. et peuvent être transmises
        à des tiers. Cette collecte a fait l’objet d’une déclaration à la CNIL.<br>Conformément à la loi « informatique et libertés
        » du 6 janvier 1978 modifiée en 2004, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous 
        concernent, que vous pouvez exercer en vous adressant à « Données Personnelles - VINOTRIP S.A.S. - Service clients, 14 
        rue Hermel, 75018 Paris ».<br>Vous pouvez également, pour des motifs légitimes, vous opposer au traitement des données 
        vous concernant.<br>VINOTRIP S.A.S. propose gratuitement aux internautes qui le souhaitent de s’inscrire à un service 
        appelé « Newsletter ». Cette lettre a, avant tout, un but pédagogique et informatif. Elle contient des informations 
        permettant aux internautes de mieux utiliser le site et met en avant les nouveautés de celui-ci. Conformément à la loi 
        pour la « confiance dans l’économie numérique » (articles L. 33-4-1 du code des postes et communications électroniques 
        et L. 121-20-5 du code de la consommation), à la loi « informatique et libertés » modifiée le 6 août 2004 et aux 
        recommandations de la CNIL, nous proposons aux internautes qui ne souhaitent plus recevoir la Newsletter de se désabonner 
        d’un simple clic.</p>

    <p>Pour plus d'information rendez-vous sur notre page de 
        <span>
            <a id="lien" href="/politiqueDeConfidentialite">
                Politique de Confidentialité
            </a>
        </span>.
    </p>

    <h2>Questions Techniques</h2>

    <p>Vous pouvez nous adresser toutes les questions techniques liées à ce site par e-mail à l’adresse contact@vinotrip.com</p>

    <h2>Hébergement</h2>

    <p>Ce site est hébergé par la société OVH S.A.S. au capital de 10.000.000€, RCS Roubaix - Tourcoing 424 761 419 00045, Code APE 
        6202A, N° TVA : FR 22 424 761 419, siège social : 2 rue Kellermann 59100 Roubaix - France (téléphone : 0 820 698 765).</p>                   
</body>


<footer class="bot-nav">        
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
</footer>
</html>