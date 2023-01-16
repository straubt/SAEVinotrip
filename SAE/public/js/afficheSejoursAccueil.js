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

var text = document.querySelector(".centreText");

var body = document.querySelector(".sejoursActus");
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
});