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

console.log(catStaff);
var adminP = document.querySelector(".admins");
var ul = create("ul", adminP, null, null, null);
admins.forEach(admin => {
    //création du li
    let li = create("li", ul, admin.prenom_staff + " " + catStaff[admin.categorie_staff - 1].libelle_categorie, null, null);
    //création du formulaire
    let form = create("form", li, null, null, null);
    form.method = "post";
    form.action = 'deleteAdmin';
    let input = create("input", form, null,null,null); //nessesaire pour le fonctionement du formulaire
    input.type = "hidden";
    input.name = "_token";
    input.value = csrf;
    //création du boutton submit
    let buttonSuppAdmin = create("button", form, "supprimer Administrateur", null, null);
    buttonSuppAdmin.type = "submit";
    //création du hidden input
    let inputAdmin = create("input",form,null,null,null)
    inputAdmin.value = admin.id_staff;
    inputAdmin.type = "hidden";
    inputAdmin.name="id_staff";
    //espacement
    create("br", ul, null, null, null);
});