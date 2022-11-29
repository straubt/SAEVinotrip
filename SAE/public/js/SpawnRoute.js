let map = document.querySelector(".map");
let imageDescription = document.querySelector("#imageRoute");
let title = document.querySelector("#title");
let descriptionRoute = document.querySelector("#descriptionRoute");
let a = document.querySelector(".map a");
let txt = ["Alsace","Bourgogne", "BORDEAUX", "PROVENCE", "CHAMPAGNE", "VAL_DE_LOIRE",
 "LANGUEDOC-ROUSSILLON", "VALLEE_DU_RHONE", "BEAUJOLAIS", "CORSE", "SUD-OUEST", "JURA", "Savoie", "Paris"]

routes.forEach(route => {
  let img = create("img", map, null, "localisation", "localisation_"+route.id_route_des_vins);
  img.src = "images/localisation.png";
  img.onclick = function() {
    imageDescription.src = route.url_photo_route_des_vins;
    title.textContent = route.libelle_route_des_vins;
    descriptionRoute.textContent = route.description_route_des_vins;

    a.href =  "/nos-sejours?Domaine="+txt[route.id_route_des_vins - 1]+"&Participant=none&Theme=none";
  };

});

function create(tag, parent, text=null, classs=null, id=null) {
  let element = document.createElement(tag);
  if (text)
    element.appendChild(document.createTextNode(text));
  parent.appendChild(element);
  if (classs)
    element.classList.add(classs);
  if (id)
    element.id = id;
  return element;
}

function spawnRoute(){
  console.log(routes[0].id_route_des_vins);
};
