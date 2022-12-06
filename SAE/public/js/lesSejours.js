
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

if (domaine != ""){
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
    lien.href = "/sejour?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
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
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
        // a.data-aos = "fade-up";
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
            lien.href = "/sejour?" + unSejour.id_sejour;
            let photo = create("img", lien, null, "image", null);
            photo.src = unSejour.photo_sejour;
            let div1 = create("div", container, null, "overlay", null);
            let div2 = create("div", div1, null, "texte", null);
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
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
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
            lien.href = "/sejour?" + unSejour.id_sejour;
            let photo = create("img", lien, null, "image", null);
            photo.src = unSejour.photo_sejour;
            let div1 = create("div", container, null, "overlay", null);
            let div2 = create("div", div1, null, "texte", null);
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
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
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
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
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
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", div1, null, "texte", null);
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        compteur++;
      }
    });
  });
}

if(domaine==null) {
  sejour.forEach(unSejour => {
    console.log("Passe");
    let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, "reveal", null);
    lien.href = "/sejour?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
    compteur++;
  })
}

else if(domaine == ""){
  sejour.forEach(unSejour => {
    let parent = create("div", body, null, "parent", null);
    let container = create("div", parent, null, "container", null);
    let lien = create("a", container, null, "reveal", null);
    lien.href = "/sejour?" + unSejour.id_sejour;
    let photo = create("img", lien, null, "image", null);
    photo.src = unSejour.photo_sejour;
    let div1 = create("div", container, null, "overlay", null);
    let div2 = create("div", div1, null, "texte", null);
    div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
    compteur++;
  });
}


if (compteur == 0) {
  let aucun = create("p", body, null, null, null);
  aucun.innerHTML = "Désolé aucun séjour n'a été trouvé..."
}


