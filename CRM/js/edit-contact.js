var modalFour = document.getElementById("myModal-four");

// Get the button that opens the modal
var btnFour = document.getElementById("myBtn-four");

// Get the <span> element that closes the modal
var spanFour = document.querySelector(".close-four");

// When the user clicks the button, open the modal 
btnFour.onclick = function() {
  modalFour.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanFour.onclick = function() {
  modalFour.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalFour) {
    modalFour.style.display = "none";
  }
}
