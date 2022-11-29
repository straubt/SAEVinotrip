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
data.forEach(unSejour => {
  let div = create("div", carousel, null, null, null);
  let image = create("img", div, null, null, null);
  image.src = unSejour.photo_sejour;
});


