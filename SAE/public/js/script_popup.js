function show_popup_msg(e)
{
    help_id = e.target.getAttribute('data-help-id');
    document.getElementsByClassName("popup-p")[help_id].hidden = false;
    document.querySelector('#popup-msg').style.opacity = '1';
}

function hide_popup_msg(e)
{
    help_id = e.target.getAttribute('data-help-id');
    console.log("p[data-help-id='" + help_id + "']")
    console.log(document.getElementsByClassName("popup-p")[help_id])
    document.getElementsByClassName("popup-p")[help_id].hidden = true;
    document.querySelector('#popup-msg').style.opacity = '0';
}

function main()
{
    const triggers = document.getElementsByClassName('popup-trigger');
    console.log(triggers)

    for (let i = 0; i < triggers.length; i++) {
        triggers[i].addEventListener('mouseenter', show_popup_msg);
        triggers[i].addEventListener('mouseleave', hide_popup_msg);
    }
}

document.body.onload = main;
