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

  console.log(client);
let div = document.querySelector("div");
create("p", div, client.id_client, null, null);
create("p", div, client.titre_client, null, null);
create("p", div, client.prenom_client, null, null);
create("p", div, client.nom_client, null, null);
create("p", div, client.mail_client, null, null);
create("p", div, client.date_naiss_client, null, null);
