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

var accent = ""
var curr_gradient = ""

function saveGradient() {

  // console.log("saved the gradient" + String(curr_gradient));
  localStorage.setItem("currentGradient",curr_gradient);
  return true;
}

function loadGradient() {
  // get the current_gradient
  curr_gradient = localStorage.getItem("currentGradient");
  // console.log(curr_gradient);

  // if the current gradient is empty set an initial one
  if (curr_gradient == null) {
    // console.log("the curr_gradient is not set");
    curr_gradient = [180,"#FFFF33","#FF00FF"];
    accent = "#FFFF33";
  } else {
    curr_gradient = curr_gradient.split(",");
  }
  // console.log("loading gradient" + String(curr_gradient));

  return curr_gradient
}

// return a gradient without impacting the current gradient
function getSingleGradient() {
  var direction = Math.floor(Math.random() * 361);
  var gradient = gradients[Math.floor(Math.random() * gradients.length)];

  return [direction,gradient[0],gradient[1]];
}

// returns a 3 item array with direction color1 and color2 for a gradient
function getGradient() {
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
