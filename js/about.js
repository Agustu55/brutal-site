// function to swap images
function switchImg(img1,img2) {
  console.log("switching images " + img1 + "with " + img2);
  var img1_src = document.getElementById(img1).src;
  var img2_src = document.getElementById(img2).src;

  document.getElementById(img1).src = img2_src;
  document.getElementById(img2).src = img1_src;
}

// code to modify hover elements
var links=["home","email"]
console.log("adding gradient to links")

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

// // this one will update the link backgound hover to be the same as the gradient
// document.getElementById(links[1]).addEventListener("mouseover",function() {
//   document.getElementById(links[1]).style.backgroundColor = String(accent)
//   document.getElementById(links[1]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
// });
//
// document.getElementById(links[1]).addEventListener("mouseout",function() {
//   document.getElementById(links[1]).style.backgroundColor = ""
//   document.getElementById(links[1]).style.backgroundImage = "";
// });
//
// // this will hide the background when the user goes back
// window.addEventListener("pageshow", () => {
//   document.getElementById(links[1]).style.backgroundColor = ""
//   document.getElementById(links[1]).style.backgroundImage = "";
//
// });
