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
create("p", divImage, client.titre_client, null, null).id="sexe";

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
var block = document.getElementById("sexe");
block.appendChild(img);


//regroupememnt infos
let divInfo = document.querySelector(".infos");
// creation info
create("p", divInfo, client.id_client, null, null).id="id";
create("p", divInfo, client.prenom_client, null, null).id="prenom";
create("p", divInfo, client.nom_client, null, null).id="nom";
create("p", divInfo, client.mail_client, null, null).id="mail";
create("p", divInfo, client.date_naiss_client, null, null).id="date";


