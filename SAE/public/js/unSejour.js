function ajaxSuccess(){
    console.log('Formulaire envoyé OK');
}

/* https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest#envoyer_des_formulaires_et_uploader_des_fichiers */

function AJAXSubmit(oFormElement){

    console.log("APPELL")

    if (!oFormElement.action) { return; }
    var oReq = new XMLHttpRequest();
    oReq.onload = ajaxSuccess;
    /* If form is POST */
    if (oFormElement.method.toLowerCase() === "post") {
        oReq.open("post", oFormElement.action);
        oReq.send(new FormData(oFormElement));
    }
    /* If form is GET */
    else 
    {
        var oField, sFieldType, nFile, sSearch = "";
        for (var nItem = 0; nItem < oFormElement.elements.length; nItem++) 
        {
            oField = oFormElement.elements[nItem];
            if (!oField.hasAttribute("name")) { continue; }
            sFieldType = oField.nodeName.toUpperCase() === "INPUT" && oField.hasAttribute("type") ? oField.getAttribute("type").toUpperCase() : "TEXT";
            if (sFieldType === "FILE") 
            {
                for (nFile = 0; nFile < oField.files.length; sSearch += "&" + escape(oField.name) + "=" + escape(oField.files[nFile++].name));
            } 
            else if ((sFieldType !== "RADIO" && sFieldType !== "CHECKBOX") || oField.checked) 
            {
                sSearch += "&" + escape(oField.name) + "=" + escape(oField.value);
            }
        }
        oReq.open("get", oFormElement.action.replace(/(?:\?.*)?$/, sSearch.replace(/^&/, "?")), true);
        oReq.send(null);
    }
}

function resize(){
    let textArea = document.getElementById("formLeaveReviewTextArea");
    console.log("resize");
    if(screen.availHeight > screen.availWidth)
        textArea.rows = 6;
    else
        textArea.rows = 3;
}

function unhideFormLeaveReview()
{
    document.getElementById("formLeaveReview").hidden = false;
    document.getElementById("openReviewForm").style.display = "none";
}

function hideFormLeaveReview()
{
    document.getElementById("formLeaveReview").hidden = true;
    document.getElementById("openReviewForm").style.display = "block";
}

function unHideAvis()
{
    let avisList = document.getElementsByClassName("avis");
    let btnAvisHiding = document.getElementById("btnAvisHiding");

    for (let avisDiv of avisList)
        avisDiv.hidden = false;

    btnAvisHiding.innerText = "Voir moins d'avis";
    btnAvisHiding.onclick = hideAvis;
    btnAvisHiding.style.position = "fixed";
    btnAvisHiding.style.float = "none";
    btnAvisHiding.style.bottom = "1em";
    btnAvisHiding.style.right = "1em";
}

function hideAvis(){
    let avisList = document.getElementsByClassName("avis");
    let btnAvisHiding = document.getElementById("btnAvisHiding");
    let $i = 0;

    for (let avisDiv of avisList){
        $i++;
        if ($i > 5)
            avisDiv.hidden = true;
    }
    btnAvisHiding.innerText = "Voir plus d'avis";
    btnAvisHiding.onclick = unHideAvis;
    btnAvisHiding.style.position = "relative";
    btnAvisHiding.style.float = "right";
    btnAvisHiding.style.bottom = "0";
    btnAvisHiding.style.right = "0";
}

function main()
{
    resize();

    let cookie_name = 'vinotrip_visited_sejour';
    let cookie = getCookie(cookie_name);

    if (!(cookie == ''))
        document.getElementById("section-sejoursConsultes").hidden = false;

    let id = document.getElementById("hidden-input-id").value;

    if (!(cookie.includes(id)))
    {
        if (cookie == '')
            setCookie(cookie_name, id, 7);
        else
            setCookie(cookie_name, cookie + ',' + id, 7);
    }

    let cookie_array = cookie.split(',');
    let get_query = '/get_sejours_data?';

    cookie_array.forEach(id => {
        get_query += 'IDs[]=' + id + '&';
    })

    get_query = get_query.slice(0, -1);

    console.log(get_query)

    var oReq = new XMLHttpRequest();
    oReq.onload = buildSejoursConsultes;
    oReq.open("get", get_query, true);
    oReq.send();
}

// XMLhttprequest Listener
function buildSejoursConsultes () {
    sejours = JSON.parse(this.responseText);
    console.log(sejours);

    let slides_container = document.getElementById("slides-container-sejoursConsultes");

    sejours.forEach(s => {
        let slide = document.createElement('li');
        slide.classList.add("slide");
        slide.style.backgroundImage = "url('http://51.83.36.122:8232/sejours/" + s.photo_sejour + "')";
        slide.innerHTML += '<a href=/sejour?' + s.id_sejour + '><div><h2>' + s.titre_sejour + '</h2></div></a>';
        slides_container.appendChild(slide);
    })
}

window.onload = main;
window.onresize = resize;