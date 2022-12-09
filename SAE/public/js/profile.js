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



// creation regroupement image 
let divImage = document.querySelector(".image");

// creation de l'image
var img = document.createElement("img");
img.id = "image"
create("p", divImage, client.titre_client, null, null).id = "sexe";

// --------- initialisation image par apport au sexe
if (client.titre_client == "M") {
  img.src = "https://cdn-icons-png.flaticon.com/512/27/27045.png";
}
else if (client.titre_client == "Mme" || client.titre_client == "Mlle") {
  img.src = "https://cdn-icons-png.flaticon.com/512/126/126379.png";
}
else {
  img.src = "https://st3.depositphotos.com/3581215/18899/v/450/depositphotos_188994514-stock-illustration-vector-illustration-male-silhouette-profile.jpg";
}


// --------- insersion image dans html
var block = document.getElementById("sexe");
block.appendChild(img);


//regroupememnt infos
let divInfo = document.querySelector(".infos");
// creation info
create("p", divInfo, client.id_client, null, null).id = "id";
create("p", divInfo, client.prenom_client, null, null).id = "prenom";
create("p", divInfo, client.nom_client, null, null).id = "nom";
create("p", divInfo, client.mail_client, null, null).id = "mail";
create("p", divInfo, client.date_naiss_client, null, null).id = "date";

let buttonModif = document.querySelector("#modification");

buttonModif.addEventListener('click', function () {
  //suppression des anciens p et remplacement par un formulaire
  let allP = document.querySelectorAll("p");
  let infos = document.querySelector(".infos");
  allP.forEach(p => {
    p.remove();
  });
  //creation du formulaire et ses methodes et actions
  let form = create("form", infos, null, null, null);
  form.method = "post";
  form.action = 'profile';
  let input = create("input", form, null, null, null); //token form csrf
  input.type = "hidden";
  input.name = "_token";
  input.value = csrf;
  //label prenom
  let labelPrenom = create("label", form, "Prenom :", null, null);
  //input prenom
  let inputPrenom = create("input", form, null, null, null);
  inputPrenom.placeholder = client.prenom_client;
  inputPrenom.name = "prenom";
  inputPrenom.value = client.prenom_client;
  //label nom
  let labelNom = create("label", form, "Nom :", null, null);
  //input nom
  let inputNom = create("input", form, null, null, null);
  inputNom.placeholder = client.nom_client;
  inputNom.name = "nom";
  inputNom.value = client.nom_client;
  //label mail
  let labelMail = create("label", form, "Mail :", null, null);
  //input mail
  let inputMail = create("input", form, null, null, null);
  inputMail.type = "email";
  inputMail.placeholder = client.mail_client;
  inputMail.name = "mail_client";
  inputMail.value = client.mail_client;
  //label dateNaiss
  let labelDateNaiss = create("label", form, "Date de naissance :", null, null);
  //input dateNaiss
  let inputDateNaiss = create("input", form, null, null, null);
  inputDateNaiss.type = 'text';
  inputDateNaiss.placeholder = client.date_naiss_client;
  inputDateNaiss.name = "date_naissance";
  inputDateNaiss.value = client.date_naiss_client;
  //label password
  let labelPassword = create("label", form, "Mot de passe :", null, null);
  //input MDP
  let inputMDP = create("input", form, null, null, null);
  inputMDP.type = "password";
  inputMDP.name = "mdp";
  //création d'un nouveau boutton
  let buttonValider = create("button", form, null, null, null);
  buttonValider.type = "Submit";
  //buttonModif suppression
  buttonModif.remove();
})


if (client.idavis == avis.idavis){
  
}