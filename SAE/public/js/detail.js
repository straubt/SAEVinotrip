function create(tag, parent, text = null, classs = null, id = null) {
    let element = document.createElement(tag)
    if (text)
      element.appendChild(document.createTextNode(text))
    parent.appendChild(element)
    if (classs)
      element.classList.add(classs)
    if (id)
      element.id = id
    return element
  }

let body = document.querySelector("body");
let divATT = create("div", body, "Commandes en attente", "attenteContainer", null); //créer un div pour les commandes en attente
divATT.addEventListener("click", e => { //ajoute un event listener sur le click

  if (e.target.className == "attenteContainer"){ //si la class correspond
    if (document.querySelector(".attente") != null){ //si la sous division n'existe pas deja (si le bouton est deja clické)
      let attente = document.querySelector(".attente"); //alors suprimer les divisions (réduire)
      attente.remove();
    }
    else{ //sinon créer les divisions
    DisplaySejours(0);
    }
  }
});

//meme chose pour tous les types de commandes
let divNP = create("div", body, "Commandes non payées", "NPContainer", null);
divNP.addEventListener("click", e => {

  if (e.target.className == "NPContainer"){
    if (document.querySelector(".nonPaye") != null){
      let nonPaye = document.querySelector(".nonPaye");
      nonPaye.remove();
    }
    else{
    DisplaySejours(1);
    }
  }
});

let divP = create("div", body, "Commandes payées", "payeContainer", null);
divP.addEventListener("click", e => {

  if (e.target.className == "payeContainer"){
    if (document.querySelector(".paye") != null){
      let paye = document.querySelector(".paye");
      paye.remove();
    }
    else{
    DisplaySejours(2);
    }
  }
});

let divRem = create("div", body, "Commandes Remplacées", "RemContainer", null);
divRem.addEventListener("click", e => {

  if (e.target.className == "RemContainer"){
    if (document.querySelector(".remplace") != null){
      let remplace = document.querySelector(".remplace");
      remplace.remove();
    }
    else{
    DisplaySejours(3);
    }
  }
});



function DisplaySejours(integer){ //fonction affichage des commandes
  if (integer == 0){ //selection de la class name a affecter en du parent dans lequel mettre les commandes
    className = "attente";
    parent = divATT;
  }
  else if (integer == 1){
    className = "nonPaye";
    parent = divNP;
  }
  else if (integer == 2){
    className = "paye";
    parent = divP;
  }
  else{
    className = "remplace";
    parent = divRem;
  }
  let commandesContainer = create("div", parent, null, className, null); //créer une div
  commandes.forEach(commande => { //pour toutes les commandes
    if (commande.code_etat_commande == integer){ //si le code etat correspond 
      let sejour = create("div", commandesContainer, null, "sejour", null); //créer une derniere div
      for (const property in commande) { //pour toutes les propriétés du séjour
        create("p", sejour, `${property}: ${commande[property]}`, null, null); //les afficher (créer un p)
        //console.log(`${property}: ${commande[property]}`);
      }
    }
  });
};
