var modalTwo = document.getElementById("myModal-two");

// Get the button that opens the modal
var btnTwo = document.getElementById("myBtn-two");

// Get the <span> element that closes the modal
var spanTwo = document.getElementsByClassName("close-two");

// When the user clicks the button, open the modal 
btnTwo.onclick = function() {
  modalTwo.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanTwo.onclick = function() {
  modalTwo.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalTwo) {
    modal.style.display = "none";
  }
}
