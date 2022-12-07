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

window.onload = resize;
window.onresize = resize;