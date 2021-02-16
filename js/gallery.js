var visible = ""; // this is the id of the image that was hovered over. Only want one of these at a time.
var show = [] // this is the array of images that were clicked and are permanatnly visible. until unclicked

// // TODO: Try to find a way to move the flex container to the mouse location or something so it isn't so jerky
// this function will be used to reveal an image with the given id
function revealImg(img_num) {
  var pinId = "pin"+img_num;
  var imgId = "img"+img_num;
  // skip everything if this one is already visible
  if (visible != img_num) {
    var visible_pin_id = "pin"+visible;
    var visible_img_id = "img"+visible;
    // hide the previosly visible image IF it is not permanantly visible
    if (visible != "" && show.indexOf(visible) < 0) {
      console.log("concealing image " + visible_img_id);
      document.getElementById(visible_pin_id).style.display='none';
      document.getElementById(visible_img_id).style.display='none';
    }
    console.log("revealing image " + imgId);
    visible = img_num;
    document.getElementById(pinId).style.display='block';
    document.getElementById(imgId).style.display='block';
  } else {
    console.log("image already visible");
  }

}


// this function will be used to permanatnly show an image with a given id when the pin is clicked
function toggleImage(img_num) {
  var pinId = "pin"+img_num;
  var imgId = "img"+img_num;

  // check if the image is already being shown permanantly
  visible="";
  var index = show.indexOf(img_num);
  if (index > -1) {
    console.log("not showing image " + imgId);
    // the image is already visible. need to hide it
    show.splice(index,1);
    console.log("img removed from array " + show);
    document.getElementById(pinId).style.display='none';
    document.getElementById(imgId).style.display='none';
  } else {
    // the image is not visible. need to show it
    console.log("showing image " + imgId);
    show.push(img_num);
    console.log("img added to array " + show);
    // rotate the pin to show it was 'pinned'
    document.getElementById(pinId).style.transform = 'rotate(0)';
    document.getElementById(pinId).style.display='block';
    document.getElementById(imgId).style.display='block';
  }
}

// code to modify hover elements
var links=["home","reset"]
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
