22// function to update source to a random image
function randomImg(){
   document.getElementById('img1').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
   document.getElementById('img2').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
   document.getElementById('img3').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
   document.getElementById('img4').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
   document.getElementById('img5').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
   document.getElementById('img6').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";

   document.getElementById('img7').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
   document.getElementById('img8').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
   document.getElementById('img9').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";

   document.getElementById('img10').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
   document.getElementById('img11').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";

   document.getElementById('img16').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
   document.getElementById('img17').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";

   document.getElementById('img22').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
   document.getElementById('img23').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";

}

function setGradient(){
  var gradient = loadGradient();
  // set the square gradient to match the loaded gradient
  document.getElementById('square1').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square2').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square3').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square4').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square5').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square6').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square7').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square8').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";


}

function randomGradient(){
  // to randomly change the background gradient
  var gradient = getGradient();
  document.getElementById('square1').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square2').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square3').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square4').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square5').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square6').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square7').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square8').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";


  // this will add txt to the gradient for debugging -- just make sure to get rid of the angle
  // document.getElementById('square').style.background = "linear-gradient("+gradient[1] + "," + gradient[2] +")";
  // document.getElementById('hexText').innerHTML = String(gradient[1])+","+String(gradient[2]);

  // save the gradient after it was generated
  saveGradient();
}





// code to modify hover elements
var links=["home","gallery","analog"]

// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[0]).addEventListener("mouseover",function() {
  document.getElementById(links[0]).style.backgroundColor = String(accent)
  document.getElementById(links[0]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[0]).addEventListener("mouseout",function() {
  document.getElementById(links[0]).style.backgroundColor = ""
  document.getElementById(links[0]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[0]).style.backgroundColor = ""
  document.getElementById(links[0]).style.backgroundImage = "";

});




// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[1]).addEventListener("mouseover",function() {
  document.getElementById(links[1]).style.backgroundColor = String(accent)
  document.getElementById(links[1]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[1]).addEventListener("mouseout",function() {
  document.getElementById(links[1]).style.backgroundColor = ""
  document.getElementById(links[1]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[1]).style.backgroundColor = ""
  document.getElementById(links[1]).style.backgroundImage = "";
});




// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[2]).addEventListener("mouseover",function() {
  document.getElementById(links[2]).style.backgroundColor = String(accent)
  document.getElementById(links[2]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[2]).addEventListener("mouseout",function() {
  document.getElementById(links[2]).style.backgroundColor = ""
  document.getElementById(links[2]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[2]).style.backgroundColor = ""
  document.getElementById(links[2]).style.backgroundImage = "";
});
