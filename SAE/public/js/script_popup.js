function move_popup_msg(e)
{
    popup_msg = document.querySelector('#popup-msg');
    console.log("Y :", e.pageY);

    p_top = e.pageY;
    if (e.clientY > window.innerHeight / 2)
    {
        popup_msg.style.top =  (e.pageY - popup_msg.offsetHeight - 1) + 'px';
    }
    else
    {
        popup_msg.style.top =  (e.pageY + 10 /*popup_msg.offsetHeight*/) + 'px';
    }

    
    popup_msg.style.left = e.pageX + 'px';

    console.log("top : " + popup_msg.style.top)
}

function show_popup_msg(e)
{
    help_id = e.target.getAttribute('data-help-id');
    popup_msg = document.querySelector('#popup-msg');
    document.getElementsByClassName("popup-p")[help_id].hidden = false;
    popup_msg.style.opacity = '1';
}

function hide_popup_msg(e)
{
    help_id = e.target.getAttribute('data-help-id');
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
document.body.onmousemove = move_popup_msg;
