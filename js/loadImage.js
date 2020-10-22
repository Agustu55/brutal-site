// the best thing to do would create img classes/files
// the image html file would include the source and all the js code to make it work


// Get the Modal
var modal1 = document.getElementById("modal1");
var modal2 = document.getElementById("modal2");
var modal3 = document.getElementById("modal3");
var modal4 = document.getElementById("modal4");
var modal5 = document.getElementById("modal5");
var modal6 = document.getElementById("modal6");
var modal7 = document.getElementById("modal7");
var modal8 = document.getElementById("modal8");
var modal9 = document.getElementById("modal9");



// Get the image from the document
var img1 = document.getElementById("img1");
var img2 = document.getElementById("img2");
var img3 = document.getElementById("img3");
var img4 = document.getElementById("img4");
var img5 = document.getElementById("img5");
var img6 = document.getElementById("img6");
var img7 = document.getElementById("img7");
var img8 = document.getElementById("img8");
var img9 = document.getElementById("img9");



// get the modal image content
var modalImg1 = document.getElementById("modalimg1");
var modalImg2 = document.getElementById("modalimg2");
var modalImg3 = document.getElementById("modalimg3");
var modalImg4 = document.getElementById("modalimg4");
var modalImg5 = document.getElementById("modalimg5");
var modalImg6 = document.getElementById("modalimg6");
var modalImg7 = document.getElementById("modalimg7");
var modalImg8 = document.getElementById("modalimg8");
var modalImg9 = document.getElementById("modalimg9");


// function to add image to the modal on click
img1.onclick = function() {
  modal1.style.display = "block";
  modalImg1.src = this.src;
}
img2.onclick = function() {
  modal2.style.display = "block";
  modalImg2.src = this.src;
}
img3.onclick = function() {
  modal3.style.display = "block";
  modalImg3.src = this.src;
}
img4.onclick = function() {
  modal4.style.display = "block";
  modalImg4.src = this.src;
}
img5.onclick = function() {
  modal5.style.display = "block";
  modalImg5.src = this.src;
}
img6.onclick = function() {
  modal6.style.display = "block";
  modalImg6.src = this.src;
}
img7.onclick = function() {
  modal7.style.display = "block";
  modalImg7.src = this.src;
}
img8.onclick = function() {
  modal8.style.display = "block";
  modalImg8.src = this.src;
}
img9.onclick = function() {
  modal9.style.display = "block";
  modalImg9.src = this.src;
}


// Get the <span> element that closes the modal
var close1 = document.getElementsByClassName("close1")[0];
var close2 = document.getElementsByClassName("close2")[0];
var close3 = document.getElementsByClassName("close3")[0];
var close4 = document.getElementsByClassName("close4")[0];
var close5 = document.getElementsByClassName("close5")[0];
var close6 = document.getElementsByClassName("close6")[0];
var close7 = document.getElementsByClassName("close7")[0];
var close8 = document.getElementsByClassName("close8")[0];
var close9 = document.getElementsByClassName("close9")[0];


// when the user clicks on <span> (x), close the modal
close1.onclick = function() {
  modal1.style.display = "none";
}
close2.onclick = function() {
  modal2.style.display = "none";
}
close3.onclick = function() {
  modal3.style.display = "none";
}
close4.onclick = function() {
  modal4.style.display = "none";
}
close5.onclick = function() {
  modal5.style.display = "none";
}
close6.onclick = function() {
  modal6.style.display = "none";
}
close7.onclick = function() {
  modal7.style.display = "none";
}
close8.onclick = function() {
  modal8.style.display = "none";
}
close9.onclick = function() {
  modal9.style.display = "none";
}
