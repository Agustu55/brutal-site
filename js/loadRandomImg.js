var colors = [
  "#1ED5E6",
  "#4760FF",
  "#A541FF",
  "#EE609C",
  "#FF849C",
  "#F5F588",
  "#AEFFAE",
  "#D1C3FC",
  "#FFCE9F",
  "#FEDC45",
];

var accent = "#F5F588"
var curr_gradient = [0,"#EE609C","#F5F588"]

// returns a 3 item array with direction color1 and color2 for a gradient
function randomGradient() {
  var direction = Math.floor(Math.random() * 361);
  var color1 = colors[Math.floor(Math.random() * colors.length)];
  var color2 = colors[Math.floor(Math.random() * colors.length)];


  // this will ensure that no two are the same
  while (color1 == color2) {
    color1 = colors[Math.floor(Math.random() * colors.length)];
  }

  accent = color1;
  curr_gradient = [direction,color1,color2];
  return [direction,color1,color2];
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
  document.getElementById('text').style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById('text').addEventListener("mouseout",function() {
  document.getElementById('text').style.backgroundColor = ""
  document.getElementById('text').style.backgroundImage = "";
});
