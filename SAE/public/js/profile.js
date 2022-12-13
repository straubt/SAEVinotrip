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



// creation regroupement image 
let divImage = document.querySelector(".image");

// creation de l'image
var img = document.createElement("img");
img.id="image"
let sex = create("p", divImage, null, null, "sexe");

// --------- initialisation image par apport au sexe
if (client.titre_client == "M"){
  img.src = "https://cdn-icons-png.flaticon.com/512/27/27045.png";
}
else if (client.titre_client == "Mme" || client.titre_client == "Mlle"){
  img.src = "https://cdn-icons-png.flaticon.com/512/126/126379.png";
}
else {
  img.src = "https://st3.depositphotos.com/3581215/18899/v/450/depositphotos_188994514-stock-illustration-vector-illustration-male-silhouette-profile.jpg";
}

// --------- insersion image dans html
sex.appendChild(img);

//regroupememnt infos
let divInfo = document.querySelector(".infos");
// creation info

create("p", divInfo, client.prenom_client, null, "prenom");
create("p", divInfo, client.nom_client, null, "nom");
create("p", divInfo, client.mail_client, null, "mail");
create("p", divInfo, client.date_naiss_client, null, "date");

let buttonModif = document.querySelector("#modification");


buttonModif.addEventListener('click', function(){
  //suppression des anciens p et remplacement par un formulaire
  let allP = document.querySelectorAll("p");
  let infos = document.querySelector(".infos");
  let allA = document.querySelectorAll(".infoFixe a");
  allA.forEach(a => {
    a.remove();
  });
  allP.forEach(p => {
    p.remove();
  });

  //creation du formulaire et ses methodes et actions
  let form = create("form", infos, null, "parentModif", null );
  form.method = "post";
  form.action = 'profile';
  let input = create("input", form, null,null,null);//nessesaire pour le fonctionement du formulaire
  input.type = "hidden";
  input.name = "_token";
  input.value = csrf;

  let inputID = create("input",form,null,null,null)
  inputID.value = client.id_client;
  inputID.type = "hidden";
  inputID.name="id_client";
  console.log(client.id_client);

  let typeClient = create("input",form,null,null,null)
  typeClient.value = client.type;
  typeClient.type = "hidden";
  typeClient.name="type";
  console.log(typeClient);

    //prenom
  let newPrenom = create("div", form, null, "champsModif", null);
    let labelPrenom = create("label", newPrenom, "nouveau Prenom : ", "champsModif", "txtPrenom");
      let inputPrenom = create("input", newPrenom, null, "champsModif", "newPrenom");
      inputPrenom.placeholder = client.prenom_client;
      inputPrenom.name = "prenom";

    //nom
  let newNom = create("div", form, null, "champsModif", null);
    let labelNom = create("label", newNom, "nouveau Nom : ", "champsModif", "txtNom");
      let inputNom = create("input", newNom, null, "champsModif", "newNom");
      inputNom.placeholder = client.nom_client
      inputNom.name = "nom";

   //mail
  let newMail = create("div", form, null, "champsModif", null);
    let labelMail = create("label", newMail, "nouveau Mail : ", "champsModif", "txtMail");
    let inputMail = create("input", newMail, null, "champsModif", "newMail");
    inputMail.type = "email";
    inputMail.placeholder = client.mail_client;
    inputMail.name = "mail_client";

    //naissance
  let newDate = create("div", form, null, "champsModif", null);
    let labelDateNaiss = create("label", newDate, "nouvelle date de naissance : ", "champsModif", "txtDate");
      let inputDateNaiss = create("input", newDate, null, "champsModif", "newDate");
      inputDateNaiss.type = 'text';
      inputDateNaiss.placeholder = client.date_naiss_client;
      inputDateNaiss.name = "date_naissance";

    //MDP
  let newMdp = create("div", form, null, "champsModif", null);
    let labelPassword = create("label", newMdp, "nouveau mot de passe : ", "champsModif", "txtMdp");
      let inputMDP = create("input", newMdp, null, "champsModif", "newMdp");
      inputMDP.type = "password";
      inputMDP.name = "mdp";
      inputMDP.minlength = "8";
      inputMDP.pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s])";
    

  //création d'un nouveau boutton valider
  let buttonValider = create("button", form, "confirmer modification", "buton", "butonValider");
  buttonValider.type = "submit";
  //buttonModif suppression
  buttonModif.remove();

  let buttonAnuler = create("button", form, "annuler modification", "buton", "butonAnuler");
  buttonValider.action = "profile";
  buttonModif.remove();
})
