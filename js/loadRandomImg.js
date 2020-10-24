var gradients = [
  ["#FFFF33","#FF00FF"],
  ["#6600FF","#FF00FF"],
  ["#33FFFF","#FF00FF"],
  ["#FF9933","#FF00FF"],
  ["#FF0033","#FFFF33"],
  ["#FFFF33","#00FFFF"],
  ["#CC00FF","#00FFFF"],
  ["#FF00CC","#00FFFF"],
  ["#00FF00","#33FFFF"],
  ["#FFFF33","#33FF99"],
  ["#FFFF33","#00FF00"],
  ["#FF33FF","#FF0000"],
  ["#66FFFF","#00FF00"]
];

var accent = "#F5F588"
var init_gradient = [180,"#FFFF33","#FF00FF"]
var curr_gradient = ""


// returns a 3 item array with direction color1 and color2 for a gradient
function randomGradient() {
  var direction = Math.floor(Math.random() * 361);
  var gradient = gradients[Math.floor(Math.random() * gradients.length)];

  curr_gradient = [direction,gradient[0],gradient[1]];

  // this will ensure that no two are the same
  if (Math.random() < 0.5) {
    accent = gradient[0]
  } else {
    accent = gradient[1]
  }
  return curr_gradient;
}


// function to update source to a random image
function randomImg(){
   // document.getElementById('logo').src = "obj/obj" + Math.floor(Math.random() * 10)+1 + ".png";
   document.getElementById('content').src = "img/img" + (Math.floor(Math.random() * 33)+1) + ".jpg";
   document.getElementById('hidden-content').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";

   // to randomly change the background gradient
   var gradient = randomGradient();
   document.getElementById('square').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";

   // this will add txt to the gradient for debugging -- just make sure to get rid of the angle
   // document.getElementById('square').style.background = "linear-gradient("+gradient[1] + "," + gradient[2] +")";
   // document.getElementById('hexText').innerHTML = String(gradient[1])+","+String(gradient[2]);
}

// this one will update the text backgound hover to be the same as the gradient
document.getElementById('text').addEventListener("mouseover",function() {
  document.getElementById('text').style.backgroundColor = String(accent)
  document.getElementById('text').style.backgroundImage = "linear-gradient("+init_gradient[0] + "deg," + init_gradient[1] + "," + init_gradient[2] +")";
  document.getElementById('text').style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";

});

document.getElementById('text').addEventListener("mouseout",function() {
  document.getElementById('text').style.backgroundColor = ""
  document.getElementById('text').style.backgroundImage = "";
});
