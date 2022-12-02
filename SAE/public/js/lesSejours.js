function create(tag, parent, text=null, classs=null, id=null) {
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


// console.log(sejour);
// console.log(destination);
// console.log(categorie_participant);
// console.log(theme);
// console.log(sejour_to_cat_participant);
domaine = domaine.toUpperCase();
participant = participant.toUpperCase();
theme = theme.toUpperCase();

var body = document.querySelector("body");

if (domaine=="NONE" && participant=="NONE" && theme=="NONE")
{
    sejour.forEach(unSejour => {
        let parent = create("div", body, null, "parent", null);
        let container = create("div", parent, null, "container", null);
        let lien = create("a", container, null, null, null);
        lien.href = "/sejour?" + unSejour.id_sejour;
        let photo = create("img", lien, null, "image", null);
        console.log(photo);
        photo.src = unSejour.photo_sejour;
        let div1 = create("div", container, null, "overlay", null);
        let div2 = create("div", container, null, "texte", null);
        div2.innerHTML = unSejour.titre_sejour + "<br>" + unSejour.prix_min_individuel_sejour + "€ Par Pers.";
        //a.data-aos = "fade-up"; //a refaire
    });
}





