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

window.addEventListener("load", resizeMedia, false);
window.addEventListener("resize", resizeMedia, false);