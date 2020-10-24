var colors = [
  "#c471ed",
  "#f64f59",
  "#FBD786",
  "#f7797d",
  "#f953c6",
  "#8E2DE2",
  "#91EAE4",
  "#38ef7d",
  "#6A82FB",
  "#ff5e62",
  "#CF8BF3",
  "#FDB99B",
  "#FFC371",
  "#92FE9D",
  "#fc00ff",
  "#00dbde",
  "#5433FF",
  "#A5FECB"
];

// returns a 3 item array with direction color1 and color2 for a gradient
function randomGradient() {
  var direction = Math.floor(Math.random() * 361);
  var color1 = colors[Math.floor(Math.random() * colors.length)];
  var color2 = colors[Math.floor(Math.random() * colors.length)];


  // this will ensure that no two are the same
  while (color1 == color2) {
    color1 = colors[Math.floor(Math.random() * colors.length)];
  }

  return [direction,color1,color2]
}


// function to update source to a random image
function randomImg(){
   document.getElementById('logo').src = "obj/obj" + Math.floor(Math.random() * 10)+1 + ".png";
   document.getElementById('content').src = "img/img" + (Math.floor(Math.random() * 33)+1) + ".jpg";
   document.getElementById('hidden-content').src = "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";

   // to randomly change the background gradient
   var gradient = randomGradient();
   document.getElementById('square').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";

   // this will add txt to the gradient for debugging -- just make sure to get rid of the angle
   // document.getElementById('hexText').innerHTML = String(gradient[1])+","+String(gradient[2]);

}
