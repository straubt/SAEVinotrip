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
    let buttonSuppAdmin = create("button", form, "supprimer Administrateur", null, "supprimer");
    buttonSuppAdmin.type = "submit";
    //création du hidden input
    let inputAdmin = create("input",form,null,null,null)
    inputAdmin.value = admin.id_staff;
    inputAdmin.type = "hidden";
    inputAdmin.name="id_staff";
    //espacement
    create("br", ul, null, null, null);
});

var nbCommandesAtt = [];
var nbCommandesNP = [];
var nbCommandesP = [];
var nbCommandesRem = [];
var totAtt = 0;
var totNP = 0;
var totP = 0;
var totRem = 0;
console.log(commandes);
commandes.forEach(commande => {
  if (commande.code_etat_commande == 0){
    nbCommandesAtt.push(commande);
    totAtt += parseFloat(commande.prix_total_commande);
  }
  if (commande.code_etat_commande == 1){
    nbCommandesNP.push(commande);
    totNP += parseFloat(commande.prix_total_commande);
  }
  if (commande.code_etat_commande == 2){
    nbCommandesP.push(commande);
    totP += parseFloat(commande.prix_total_commande);
  }
  if (commande.code_etat_commande == 3){
    nbCommandesRem.push(commande);
    totRem += parseFloat(commande.prix_total_commande);
  }
});
console.log(nbCommandesAtt, nbCommandesNP, nbCommandesP, nbCommandesRem);
totCA = totAtt + totNP + totP + totRem;
totCommandes = nbCommandesAtt.length + nbCommandesNP.length + nbCommandesP.length + nbCommandesRem.length;
let statistiques = document.querySelector(".commandes");
//commandes en attente
let divAtt = create("div", statistiques, "commandes en attente", null, null)
let pAtt = create("p", divAtt, totAtt + "€ (" + nbCommandesAtt.length + " commandes)", null, null);
//commandes non payées
let divNP = create("div", statistiques, "commandes non payées", null, null);
let pNP = create("p", divNP, totNP + "€ (" + nbCommandesNP.length + " commandes)", null, null);
//commandes payées
let divP = create("div", statistiques, "commandes payées", null, null);
let pP = create("p", divP, totP + "€ (" + nbCommandesP.length + " commandes)", null, null);
//commandes remplacées
let divRem = create("div", statistiques, "commandes remplacées", null, null);
let pRem = create("p", divRem, totRem + "€ (" + nbCommandesRem.length + " commandes)", null, null);
//total
let divTot = create("div", statistiques, "Total", null, null);
let pTot = create("p", divTot, totCA + "€ (" + totCommandes + " commandes)", null, null);
let aAtt = create("a", pTot, " voir le détail des comandes", null, null);
aAtt.href = "/detail";
// let pNB = create("p", divNB, commandes.)