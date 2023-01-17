$(document).ready(function(){
  var owl = $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 5,
      nav: true,
      responsive: {
          0:{
            items: 1
          },
          570: {
            items: 1
          },
          800: {
            items: 2
          },
          1000: {
            items: 3
          }
      }
  });
});

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

let carousel = document.querySelector(".owl-carousel");
console.log(data[0]);
var clas
data.forEach(unSejour => {
  if (unSejour.id_sejour = 2){
    clas = "centreText";
  }
  else{
    clas = null;
  }
  let div = create("div", carousel, null, clas, null);
  let image = create("img", div, null, null, null);
  $PORT_SERVEUR_IMG = '8232'
  image.src = 'http://51.83.36.122:' + $PORT_SERVEUR_IMG + '/sejours/' + unSejour.photo_sejour;
});

console.log(client);


