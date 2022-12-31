<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personalisation cookies</title>
    <link rel="icon" type="image/x-icon" href="../images/images.jpg">
    <link rel="stylesheet" href="../styleGeneral.css">
    <link rel="stylesheet" href="style.css">
    <script src="public/cookie.js">
    //autre script js a la fin
</head>
<body>
    <h3>pour le moment c'est ur une page comme ca mais il faudrait faire en sorte que ce soit un formulaire qui est caché de 
        maniere constante sauf quand on clique sur le boutton personaliser</h3>

    <section class="personalisation"> 
        <td><button class="buttonResForm" id="ResForm" onclick="resClickFunction()">Rénitialiser</button> </td>
        <table class="blueTable">
            <thead>
                <tr>
                    <th id="Cookies">Cookies</th>
                    <th id="Description">Description</th>
                    <th id="Accepter">Accepter</th>
                    <th id="Reffuser">Reffuser</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Liste des cookies</td>
                    <td>Description simplifier pour ceux-ci</td>
                    <td><button class="buttonFormTA" id="Accept" onclick="clickFunctionA()" >Tout Accepter</button></td>
                    <td><button class="buttonFormTR" id="Refus" onclick="clickFunctionR()">Tout refuser</button> </td>
                    
                </tr>
                <tr>
                    <td>cookies2</td>
                    <td>Description2</td>
                    <td><button class="buttonForm" id="Accept" >Accepter</button></td>
                    <td><button class="buttonForm" id="Refus" >Refuser</button> </td>
                </tr>                
                <tr>
                    <td>cookies3</td>
                    <td>Description3</td>
                    <td><button class="buttonForm" id="Accept" >Accepter</button></td>
                    <td><button class="buttonForm" id="Refus">Refuser</button> </td>
                </tr>
                <tr>
                    <td>cookies4</td>
                    <td>Description4</td>
                    <td><button class="buttonForm" id="Accept">Accepter</button></td>
                    <td><button class="buttonForm" id="Refus">Refuser</button> </td>
                </tr>
            </tbody>
        </table>
        <td><button class="buttonOkForm" id="OkForm" onclick="window.location.href = './pageAcceuil.html';">Valider</button> </td>
    </section> 

    <script src="./mainPagePersonalisation.js"></script>
</body>
</html>