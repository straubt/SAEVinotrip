<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnalisation des cookies</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel="stylesheet">
    <link rel="stylesheet" href="css/styleCookies.css">
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="css/styleWelcome.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/images.jpg">
</head>

<section class="personalisation"> 
        <table class="blueTable">
            <thead>
                <tr>
                    <th id="Cookies">Cookies</th>
                    <th id="Description">Description</th>
                    <th id="Accepter"><button class="buttonFormTA" onclick="clickFunctionTA()" >Tout Accepter</button></th>
                    <th id="Refuser"><button class="buttonFormTR" onclick="clickFunctionTR()">Tout refuser</button></th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>nécessaires</td>
                    <td>obligatoires</td>
                    <td><button class="Accepter" id="1" onclick="clickFunctionA(this)">Accepter</button></td>
                    <td><button class="Refuser" id="2" onclick="clickFunctionR(this)">Refuser</button> </td>
                </tr>                
                <tr>
                    <td>de suivi</td>
                    <td>facultatifs</td>
                    <td><button class="Accepter" id="3" onclick="clickFunctionA(this)">Accepter</button></td>
                    <td><button class="Refuser" id="4" onclick="clickFunctionR(this)">Refuser</button> </td>
                </tr>
                <tr>
                    <td>de fonctionnalité</td>
                    <td>facultatifs</td>
                    <td><button class="Accepter" id="5" onclick="clickFunctionA(this)">Accepter</button></td>
                    <td><button class="Refuser" id="6" onclick="clickFunctionR(this)">Refuser</button> </td>
                </tr>
                <tr>
                    <td>publicitaires</td>
                    <td>facultatifs</td>
                    <td><button class="Accepter" id="5" onclick="clickFunctionA(this)">Accepter</button></td>
                    <td><button class="Refuser" id="6" onclick="clickFunctionR(this)">Refuser</button> </td>
                </tr>
            </tbody>
        </table>
        <td><button class="buttonOkForm" id="OkForm">Valider</button> </td>
        <!--   <td><button class="buttonCookies" id="OkForm" onclick="getCookie()">get Cookies</button> </td> -->
        <script src='js/mainPagePersonalisation.js'></script>
    </section> 

</html>