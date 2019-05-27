var btnApply;

/**
 * Function which resizes the 'first-section' div to properly fit in different resolutions.
 * It was determined that a width of 768 was the limit for a contain
 */

function resizeMedia()  {
    var first = document.getElementById("first-section");    
    
    if (document.body.clientWidth < 768) {        
        first.classList.remove("bg-contain");
        first.classList.add("bg-cover");
    }
    else{
        first.classList.remove("bg-cover");
        first.classList.add("bg-contain");
    }    
}

/**
 * Function to initialize controlers and calls the resizeMedia function
 */
function initializeControllers()    {
    btnApply = document.getElementById("applyNow");    
    btnApply.addEventListener("click", redirectToApplication, false);
}

function redirectToApplication()    {
    location.replace("application.html");
}


window.addEventListener("load", resizeMedia, false);
window.addEventListener("load", initializeControllers, false);
window.addEventListener("resize", resizeMedia, false);
