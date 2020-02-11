/** This file contains the script which closes the modal whenever a user clicks on the "x" or "close" icon * 
 */

// Get the modal
var modal = document.getElementById("myModal");

modal.style.display = "block";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the <button> element which serves as a link
var button = document.getElementById("btnModal")

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

if (button != null) {
    // When the user clicks on the "GET TICKETS" button, he/she is redirected to the event's eventbrite page
    button.onclick = function() {    
      window.location = "https://www.eventbrite.ca/e/gracie-barra-bc-conference-tickets-90716809419";
  }
}


