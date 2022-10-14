var modalThree = document.getElementById("myModal-three");

// Get the button that opens the modal
var btnThree = document.getElementById("myBtn-three");

// Get the <span> element that closes the modal
var spanThree = document.getElementsByClassName("close-three")[0];

// var $modal = $("#myModal-three");

// When the user clicks the button, open the modal 
btnThree.onclick = function() {
  modalThree.style.display = "block";
  console.log("worked")
}

// $("#myBtn-three").on("click", function () {
//   $modal.show();
// });

// When the user clicks on <span> (x), close the modal
spanThree.onclick = function() {
  modalThree.style.display = "none";
}

// $(".close-three").on("click", function () {
//   $modal.hide();
// });

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalThree) {
    modalThree.style.display = "none";
  }
}

// $(window).on("click", "#myModal-three", function () {
//   $modal.hide();
// });
