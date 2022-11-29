
//button res
function resClickFunction() {
    let Buttons = document.querySelectorAll("button");
    for (let button of Buttons){
        button.style.backgroundColor ="white";
        document.getElementsByTagName("BUTTON")[0].style.backgroundColor = "#1C6EA4";
        document.getElementsByTagName("BUTTON")[9].style.backgroundColor = "green"; 
    }    
}

//tout les bouttons accepter
function clickFunctionA() {
    document.getElementsByTagName("BUTTON")[1].style.backgroundColor = "yellow"; 
    document.getElementsByTagName("BUTTON")[3].style.backgroundColor = "yellow"; 
    document.getElementsByTagName("BUTTON")[5].style.backgroundColor = "yellow"; 
    document.getElementsByTagName("BUTTON")[7].style.backgroundColor = "yellow"; 
}

//tout les bouttons refuser
function clickFunctionR() {
    document.getElementsByTagName("BUTTON")[2].style.backgroundColor = "pink"; 
    document.getElementsByTagName("BUTTON")[4].style.backgroundColor = "pink"; 
    document.getElementsByTagName("BUTTON")[6].style.backgroundColor = "pink"; 
    document.getElementsByTagName("BUTTON")[8].style.backgroundColor = "pink"; 
}

// IL FAUDRA LES MEMES COULEURS POUR LES BOUTTONS (LES COULEURS ACTUELLES SONT POUR LES TESTS)

//pour 1 boutton

buttonActuels = document.querySelectorAll(".buttonForm")
buttonActuels.forEach(buton => {
    if (buton.backgroundColor == "magenta") {
        buton.addEventListener("click", function(){
        buton.style.backgroundColor = "white"; 
    })
    } else {
        buton.addEventListener("click", function(){
            buton.style.backgroundColor = "magenta"; 
        }) 
    }
});


/*

//pour tout les accept
buttonATotal = document.querySelectorAll(".buttonFormTA")
buttonATotal.forEach(buton2 => {
    buton.addEventListener("click", function(){
        buton.style.backgroundColor = "yellow"; 
    })
});
//pour tout les refus
buttonRTotal = document.querySelectorAll(".buttonFormTR")
buttonRTotal.forEach(buton => {
    buton.addEventListener("click", function(){
        buton.style.backgroundColor = "blue"; 
    })
});

*/