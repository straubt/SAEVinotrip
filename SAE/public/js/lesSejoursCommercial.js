PORT_SERVEUR_IMG = '8232'
sejour.forEach(unSejour => {
  unSejour.photo_sejour = 'http://51.83.36.122:' + PORT_SERVEUR_IMG + '/sejours/' + unSejour.photo_sejour
});

console.log(sejour)

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

let divFiltre = document.querySelector("#divFiltre");
let buttonCompare = document.querySelector("#buttonFiltre");

if (domaine != "") {
  domaine = domaine.toUpperCase();
  participant = participant.toUpperCase();
  theme = theme.toUpperCase();
}
var body = document.querySelector("body");
let compteur = 0;
if (domaine == "NONE" && participant == "NONE" && theme == "NONE") {
  sejour.forEach(unSejour => {
    let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, "reveal", null);
    lien.href = "/sejourCommercial?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    let checkbox = create("input", div1, null, null, unSejour.id_sejour);
    checkbox.type = "checkbox";
    let label = create("label", checkbox, null, null, null);
    label.for = "check"
    label.text = "Filtrer";
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
    compteur++;
  });

}
if (domaine != "NONE" && participant == "NONE" && theme == "NONE") {
  sejour.forEach(unSejour => {
    destination.forEach(uneDestination => {
      if (uneDestination.libelle_destination == domaine && uneDestination.id_destination == unSejour.id_destination) {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, "reveal", null);
        lien.href = "/sejourCommercial?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        let checkbox = create("input", div1, null, null, unSejour.id_sejour);
        checkbox.type = "checkbox";
        let label = create("label", checkbox, null, null, null);
        label.for = "check"
        label.text = "Filtrer";
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}
if (domaine == "NONE" && participant != "NONE" && theme == "NONE") {
  sejour.forEach(unSejour => {
    sejour_to_cat_participant.forEach(unSejToCat => {
      categorie_participant.forEach(uneCategorie => {
        if (uneCategorie.lib_categorie_participant == participant) {
          if (unSejToCat.id_categorie_participant == uneCategorie.id_categorie_participant && unSejToCat.id_sejour == unSejour.id_sejour) {
            let parent = create("div", body, null, "parent", null);
            let container = create("div", parent, null, "container", null);
            let lien = create("a", container, null, "reveal", null);
            lien.href = "/sejourCommercial?" + unSejour.id_sejour;
            let photo = create("img", lien, null, "image", null);
            photo.src = unSejour.photo_sejour;
            let div1 = create("div", container, null, "overlay", null);
            let div2 = create("div", div1, null, "texte", null);
            let checkbox = create("input", div1, null, null, unSejour.id_sejour);
            checkbox.type = "checkbox";
            let label = create("label", checkbox, null, null, null);
            label.for = "check"
            label.text = "Filtrer";
            div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
            compteur++;
          }
        }
      });
    });
  });
}
if (domaine == "NONE" && participant == "NONE" && theme != "NONE") {
  sejour.forEach(unSejour => {
    lesThemes.forEach(unTheme => {
      if (unTheme.libelle_theme == theme && unTheme.id_theme == unSejour.id_theme) {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, "reveal", null);
        lien.href = "/sejourCommercial?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        let checkbox = create("input", div1, null, null, unSejour.id_sejour);
        checkbox.type = "checkbox";
        let label = create("label", checkbox, null, null, null);
        label.for = "check"
        label.text = "Filtrer";
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}

if (domaine != "NONE" && participant != "NONE" && theme == "NONE") {
  let tab = [];
  sejour.forEach(unSejour => {
    destination.forEach(uneDestination => {
      if (uneDestination.libelle_destination == domaine && uneDestination.id_destination == unSejour.id_destination) {
        tab.push(unSejour);
      }
    });
  });
  tab.forEach(unSejour => {
    sejour_to_cat_participant.forEach(unSejToCat => {
      categorie_participant.forEach(uneCategorie => {
        if (uneCategorie.lib_categorie_participant == participant) {
          if (unSejToCat.id_categorie_participant == uneCategorie.id_categorie_participant && unSejToCat.id_sejour == unSejour.id_sejour) {
            let parent = create("div", body, null, "parent", null);
            let container = create("div", parent, null, "container", null);
            let lien = create("a", container, null, "reveal", null);
            lien.href = "/sejourCommercial?" + unSejour.id_sejour;
            let photo = create("img", lien, null, "image", null);
            photo.src = unSejour.photo_sejour;
            let div1 = create("div", container, null, "overlay", null);
            let div2 = create("div", div1, null, "texte", null);
            let checkbox = create("input", div1, null, null, unSejour.id_sejour);
            checkbox.type = "checkbox";
            let label = create("label", checkbox, null, null, null);
            label.for = "check"
            label.text = "Filtrer";
            div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
            compteur++;
          }
        }
      });
    });
  });
}
if (domaine != "NONE" && participant == "NONE" && theme != "NONE") {
  let tab = [];
  sejour.forEach(unSejour => {
    destination.forEach(uneDestination => {
      if (uneDestination.libelle_destination == domaine && uneDestination.id_destination == unSejour.id_destination) {
        tab.push(unSejour);
      }
    });
  });
  tab.forEach(unSejour => {
    lesThemes.forEach(unTheme => {
      if (unTheme.libelle_theme == theme && unTheme.id_theme == unSejour.id_theme) {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, "reveal", null);
        lien.href = "/sejourCommercial?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        let checkbox = create("input", div1, null, null, unSejour.id_sejour);
        checkbox.type = "checkbox";
        let label = create("label", checkbox, null, null, null);
        label.for = "check"
        label.text = "Filtrer";
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}
if (domaine == "NONE" && participant != "NONE" && theme != "NONE") {
  let tab = [];
  sejour.forEach(unSejour => {
    sejour_to_cat_participant.forEach(unSejToCat => {
      categorie_participant.forEach(uneCategorie => {
        if (uneCategorie.lib_categorie_participant == participant) {
          if (unSejToCat.id_categorie_participant == uneCategorie.id_categorie_participant && unSejToCat.id_sejour == unSejour.id_sejour) {
            tab.push(unSejour);
          }
        }
      });
    });
  });
  tab.forEach(unSejour => {
    lesThemes.forEach(unTheme => {
      if (unTheme.libelle_theme == theme && unTheme.id_theme == unSejour.id_theme) {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, "reveal", null);
        lien.href = "/sejourCommercial?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        let checkbox = create("input", div1, null, null, unSejour.id_sejour);
        checkbox.type = "checkbox";
        let label = create("label", checkbox, null, null, null);
        label.for = "check"
        label.text = "Filtrer";
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}
if (domaine != "NONE" && participant != "NONE" && theme != "NONE") {
  let tab1 = [];
  let tab2 = [];
  sejour.forEach(unSejour => {
    destination.forEach(uneDestination => {
      if (uneDestination.libelle_destination == domaine && uneDestination.id_destination == unSejour.id_destination) {
        tab1.push(unSejour);
      }
    });
  });
  tab1.forEach(unSejour => {
    sejour_to_cat_participant.forEach(unSejToCat => {
      categorie_participant.forEach(uneCategorie => {
        if (uneCategorie.lib_categorie_participant == participant) {
          if (unSejToCat.id_categorie_participant == uneCategorie.id_categorie_participant && unSejToCat.id_sejour == unSejour.id_sejour) {
            tab2.push(unSejour);
          }
        }
      });
    });
  });
  tab2.forEach(unSejour => {
    lesThemes.forEach(unTheme => {
      if (unTheme.libelle_theme == theme && unTheme.id_theme == unSejour.id_theme) {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, "reveal", null);
        lien.href = "/sejourCommercial?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        let checkbox = create("input", div1, null, null, unSejour.id_sejour);
        checkbox.type = "checkbox";
        let label = create("label", checkbox, null, null, null);
        label.for = "check"
        label.text = "Filtrer";
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}

if (domaine == null) {
  sejour.forEach(unSejour => {
    let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, "reveal", null);
    lien.href = "/sejourCommercial?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    let checkbox = create("input", div1, null, null, unSejour.id_sejour);
    checkbox.type = "checkbox";
    let label = create("label", checkbox, null, null, null);
    label.for = "check"
    label.text = "Filtrer";
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
    compteur++;
  })
}

else if (domaine == "") {
  sejour.forEach(unSejour => {
    let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, "reveal", null);
    lien.href = "/sejourCommercial?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    let checkbox = create("input", div1, null, null, unSejour.id_sejour);
    checkbox.type = "checkbox";
    let label = create("label", checkbox, null, null, null);
    label.for = "check"
    label.text = "Filtrer";
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
    compteur++;
  }
  )
}


if (compteur == 0) {
  let aucun = create("p", body, null, null, null);
  aucun.innerHTML = "Désolé aucun séjour n'a été trouvé..."
}

var tabId = [];


var cb = document.querySelectorAll("[type=checkbox]"); // récupère tous les checkbox
var i = 0, // initialise i a 0
  l = cb.length; // stocke le nombre de checkboxes

for (i; i < l; i++) // pour toutes les checkbox faire:
  cb[i].addEventListener("change", function () {

    // ajouter un evenement  au changement de statut
    if (document.querySelectorAll(":checked").length > 5) //si le nombre de checkbox check supp a 5 ? faire
      this.checked = false; //cb uncheck
    if (this.checked == true) {
      tabId.push(this.id);
    }
    else {
      console.log("je passe");
      tabId.splice(tabId.indexOf(this.id), tabId.indexOf(this.id) + 1)
    }
    console.log(tabId);

  }, false); // faux ?

buttonCompare.addEventListener("click", function () {
  if (tabId.length == 2) {
    let buttonRetour = create("button",divFiltre,null,"buttonRetour",null);
    buttonRetour.addEventListener("click",function(){
      document.location.reload(true);
    });
    compteur = 2;
    let parents = document.querySelectorAll(".parent");
    for (let pas = 0; pas < parents.length; pas++) {
      parents[pas].remove();
    };
    sejour.forEach(unSejour => {
      if(unSejour.id_sejour == tabId[0] || unSejour.id_sejour == tabId[1]){
      let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, null, null);
    lien.href = "/sejourCommercial?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    let checkbox = create("input", div1, null, null, unSejour.id_sejour);
    checkbox.type = "checkbox";
    let label = create("label", checkbox, null, null, null);
    label.for = "check"
    label.text = "Filtrer";
    let nuits = unSejour.duree_sejour-1;
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers." + "<br>" + unSejour.description_sejour + "<br>" + unSejour.duree_sejour + " jours | " + nuits + " nuits" ;
      }
    });
    
  }
});


    // else {
    //   let info = create("a",divFiltre,null,null,null);
    //   info.innerHTML = "oui";
    // };



