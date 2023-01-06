
//recuperer le tag de l'element cliqué et si le texte de celuici est accepter changer pour blanc le tag+1
//accepter bouttons par bouttons
function clickFunctionA(button) {
    if(button.style.backgroundColor === "red") {
        button.style.backgroundColor = "white";
    }
    else {
        button.style.backgroundColor = "red";
        var idCurent = button.getAttribute('id');
        var idRefus = parseInt(idCurent, 10) +1;
        var refus = document.getElementById(idRefus)
        refus.style.backgroundColor = "white"
    }
}

function clickFunctionR(button) {
    if(button.style.backgroundColor === "red") {
        button.style.backgroundColor = "white";
    }
    else {
        button.style.backgroundColor = "red";
        var idCurent = button.getAttribute('id');
        var idRefus = parseInt(idCurent, 10) -1;
        var refus = document.getElementById(idRefus)
        refus.style.backgroundColor = "white"
    }
}

//tout les bouttons accepter
function clickFunctionTA() {
    const Accepter = document.getElementsByClassName('Accepter');
    const buttonTout = document.getElementsByClassName('buttonFormTA');
    for (let i = 0; i < Accepter.length; i++) {
        clickFunctionA(Accepter[i])
    }
}


//tout les bouttons refuser
function clickFunctionTR() {
    const Accepter = document.getElementsByClassName('Refuser');
    for (let i = 0; i < Accepter.length; i++) {
        clickFunctionR(Accepter[i])
    }
}

//bandeau cookies
const cookieBanner = document.getElementById('cookie-banner');
//tableau config cookies
const edit = document.getElementsByClassName('personalisation');

const okEdit = document.getElementById('OkForm');
const cookieBannerAccept = document.getElementById('cookie-banner-button');
const cookieBannerEdit = document.getElementById('cookie-banner-button-Edit');

cookieBannerAccept.addEventListener('click', function() {
  cookieBanner.style.display = 'none';
  // set a cookie to remember that the user has accepted the banner
  setCookie('cookie_configured', 'true', 7);
});

cookieBannerEdit.addEventListener('click', function() {
  edit[0].hidden = false;
  // set a cookie to remember that the user has accepted the banner
});

okEdit.addEventListener('click', function() {
  edit[0].hidden = true;
  // set a cookie to remember that the user has accepted the banner
  console.log('ok')
  setCookie('cookie_configured', 'true', 7);
  window.location.href = "/";
});
