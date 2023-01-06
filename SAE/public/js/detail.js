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
let divATT = create("div", body, "Commandes en attente", null, null);
// divATT.onClick = function
