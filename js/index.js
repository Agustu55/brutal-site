// function to update source to a random image
function randomImg(){

  document.getElementById('hidden-content').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";

  // load a horizontal or vertical image less than randomly
  if (Math.random() < 0.25) {
    document.getElementById('content').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
  } else {
    document.getElementById('content').src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
  }
}

function setGradient(){
  var gradient = loadGradient();
  // set the square gradient to match the loaded gradient
  document.getElementById('square1').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
}

function randomGradient(){
  // to randomly change the background gradient
  var gradient = getGradient();
  document.getElementById('square1').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";

  // this will add txt to the gradient for debugging -- just make sure to get rid of the angle
  // document.getElementById('square').style.background = "linear-gradient("+gradient[1] + "," + gradient[2] +")";
  // document.getElementById('hexText').innerHTML = String(gradient[1])+","+String(gradient[2]);

  // save the gradient after it was generated
  saveGradient();
}

// this one will update the link backgound hover to be the same as the gradient
document.getElementById('real').addEventListener("mouseover",function() {
  document.getElementById('real').style.backgroundColor = String(accent)

  if (curr_gradient == "") {
    document.getElementById('real').style.backgroundImage = "linear-gradient(180deg,FFFF33,FF00FF)";
  } else {
    document.getElementById('real').style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
  }

});

document.getElementById('real').addEventListener("mouseout",function() {
  document.getElementById('real').style.backgroundColor = ""
  document.getElementById('real').style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById('real').style.backgroundColor = ""
  document.getElementById('real').style.backgroundImage = "";

});
