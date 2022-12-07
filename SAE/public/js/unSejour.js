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
    let btnStickyAvisHiding = document.getElementById("btnStickyAvisHiding");

    for (let avisDiv of avisList)
        avisDiv.hidden = false;

    btnAvisHiding.onclick = hideAvis;
    btnAvisHiding.innerText = "Voir moins d'avis";
    btnStickyAvisHiding.hidden = false;
}

function hideAvis(){
    let avisList = document.getElementsByClassName("avis");
    let btnAvisHiding = document.getElementById("btnAvisHiding");
    let btnStickyAvisHiding = document.getElementById("btnStickyAvisHiding");
    let $i = 0;

    for (let avisDiv of avisList){
        $i++;
        if ($i > 5)
            avisDiv.hidden = true;
    }
    btnAvisHiding.onclick = unHideAvis;
    btnAvisHiding.innerText = "Voir plus d'avis";
    btnStickyAvisHiding.hidden = true;
}

window.onload = resize;
window.onresize = resize;