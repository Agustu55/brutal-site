// function to update source to a random image
function defaultImg(){
   document.getElementById('img1').src = "img/vrt12.jpg";
   document.getElementById('img2').src = "img/vrt10.jpg";
   document.getElementById('img3').src = "img/hrz3.jpg";
   document.getElementById('img4').src = "img/hrz12.jpg";
   document.getElementById('img5').src = "img/hrz11.jpg";

   document.getElementById('img6').src = "img/vrt15.jpg";
   document.getElementById('img7').src = "img/vrt7.jpg";
   document.getElementById('img8').src = "img/vrt9.jpg";

   document.getElementById('img9').src = "img/vrt1.jpg";

   document.getElementById('img10').src = "img/hrz9.jpg";
   document.getElementById('img11').src = "img/vrt16.jpg";

   document.getElementById('img16').src = "img/vrt8.jpg";
   document.getElementById('img17').src = "img/vrt2.jpg";

   document.getElementById('img22').src = "img/hrz8.jpg";
   document.getElementById('img23').src = "img/hrz5.jpg";

   document.getElementById('mobile_img24').src = "img/hrz10.jpg";
   document.getElementById('mobile_img25').src = "img/hrz5.jpg";

   document.getElementById('mobile_img26').src = "img/vrt3.jpg";
   document.getElementById('mobile_img27').src = "img/vrt12.jpg";
   document.getElementById('mobile_img28').src = "img/vrt17.jpg";

   document.getElementById('mobile_img29').src = "img/vrt13.jpg";
   document.getElementById('mobile_img30').src = "img/vrt1.jpg";
   document.getElementById('mobile_img31').src = "img/vrt18.jpg";
   document.getElementById('mobile_img32').src = "img/vrt7.jpg";
   document.getElementById('mobile_img33').src = "img/vrt2.jpg";
   document.getElementById('mobile_img34').src = "img/vrt19.jpg";
   document.getElementById('mobile_img35').src = "img/vrt19.jpg";
   document.getElementById('mobile_img36').src = "img/vrt22.jpg";
   document.getElementById('mobile_img37').src = "img/vrt12.jpg";
   document.getElementById('mobile_img38').src = "img/vrt13.jpg";

}

// choose a random image for a specific image id
function randomImg(imgId) {
  var img = document.getElementById(imgId);
  var old_src = img.src;

  if (old_src.includes("vrt")) {
    img.src = "img/vrt" + (Math.floor(Math.random() * 21)+1) + ".jpg";
  } else {
    img.src= "img/hrz" + (Math.floor(Math.random() * 12)+1) + ".jpg";
  }

}

// this represents the img # of the first img in the strip
var curr_img = 1;

// function to move the progress the images down one
function imgDown() {
  document.getElementById('img21').src = "img/vrt"+((curr_img % 18)+1)+".jpg";
  document.getElementById('img20').src = "img/vrt"+(((curr_img+1) % 18)+1)+".jpg";
  document.getElementById('img19').src = "img/vrt"+(((curr_img+2) % 18)+1)+".jpg";
  document.getElementById('img18').src = "img/vrt"+(((curr_img+3) % 18)+1)+".jpg";

  curr_img++;
  if (curr_img > 18) {
    curr_img = 1;
  }
}

// function to swap images
function switchImg(img1,img2) {
  console.log("switching images " + img1 + "with " + img2);
  var img1_src = document.getElementById(img1).src;
  var img2_src = document.getElementById(img2).src;

  document.getElementById(img1).src = img2_src;
  document.getElementById(img2).src = img1_src;
}
// choose a random gradient for a specific square
function randomSingleGradient(squareId) {
  var gradient = getSingleGradient();
  console.log("changing gradient for "+squareId +"to " + gradient);
  document.getElementById(squareId).style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
}

function loadImg() {
  document.getElementById("insta_pic").src="img/insta2.jpg";
  document.getElementById("vsco_pic").src="img/vsco1.jpg";
  document.getElementById("broll_pic").src="broll/broll2.jpg";
  document.getElementById("img12").src="img/hrz1.jpg";
  document.getElementById("img13").src="img/hrz2.jpg";
  document.getElementById("img14").src="img/hrz3.jpg";
  document.getElementById("img15").src="img/hrz4.jpg";
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

  document.getElementById('square9').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square10').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square11').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";
  document.getElementById('square12').style.background = "linear-gradient("+gradient[0] + "deg," + gradient[1] + "," + gradient[2] +")";



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

// show the extralinks div
function showExtraLinks() {
  document.getElementById("extra_links").style.display='flex';
  document.getElementById("extra_text").style.display='block';
  document.getElementById("text13").style.display='block';
}

// hide extralinks div when screen is shrunk on desktop views
function hideExtraLinks() {
  if ( $(window).width() <= 1000) {

    document.getElementById("extra_links").style.display='none';
    document.getElementById("extra_text").style.display='none';
    document.getElementById("text13").style.display='none';
  }
}
// javascript to scroll the document to bottom of page when arrow is clicked
function bottomFunction() {
  document.body.scrollBottom = 1000000;
  document.documentElement.scrollTop = 100000;
}

// When the user clicks on the button, scroll to the top of the document
function up() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

  // hide the extra text and links and stuff
  document.getElementById("extra_links").style.display='none';
  document.getElementById("extra_text").style.display='none';
  document.getElementById("text13").style.display='none';
}

function scrollDown() {

  // figure out the document height
  var body = document.body, html = document.documentElement;

  var height = Math.max( body.scrollHeight, body.offsetHeight,
                       html.clientHeight, html.scrollHeight, html.offsetHeight );

  var scroll_length = 30;
  // calculate how far I need to scroll
  var curr_location = document.documentElement.scrollTop;
  var distance = height - curr_location;
  var scrolls = Math.ceil(distance/scroll_length);
  var scroll = 0;

  // run scroll interval until bottom is reached
  var scroll_interval = setInterval(function() {
    window.scrollBy(0, scroll_length)
    // cancel scroll when bottom is reached
    if (++scroll === scrolls) {
      window.clearInterval(scroll_interval)
    }
  }, 10);
}


// code to modify hover elements
var links=["home_link","gallery_link","analog_link","mobile_about_link","mobile_home_link","mobile_print_link"]

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



// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[3]).addEventListener("mouseover",function() {
  document.getElementById(links[3]).style.backgroundColor = String(accent)
  document.getElementById(links[3]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[3]).addEventListener("mouseout",function() {
  document.getElementById(links[3]).style.backgroundColor = ""
  document.getElementById(links[3]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[3]).style.backgroundColor = ""
  document.getElementById(links[3]).style.backgroundImage = "";
});

// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[4]).addEventListener("mouseover",function() {
  document.getElementById(links[4]).style.backgroundColor = String(accent)
  document.getElementById(links[4]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[4]).addEventListener("mouseout",function() {
  document.getElementById(links[4]).style.backgroundColor = ""
  document.getElementById(links[4]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[4]).style.backgroundColor = ""
  document.getElementById(links[4]).style.backgroundImage = "";
});

// this one will update the link backgound hover to be the same as the gradient
document.getElementById(links[5]).addEventListener("mouseover",function() {
  document.getElementById(links[5]).style.backgroundColor = String(accent)
  document.getElementById(links[5]).style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";
});

document.getElementById(links[5]).addEventListener("mouseout",function() {
  document.getElementById(links[5]).style.backgroundColor = ""
  document.getElementById(links[5]).style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById(links[5]).style.backgroundColor = ""
  document.getElementById(links[5]).style.backgroundImage = "";
});



// this will update the arrow collor
document.getElementById("downArrow").addEventListener("mouseover",function() {

  document.getElementById("downArrow").style.backgroundColor = String(accent)
  document.getElementById("downArrow").style.backgroundImage = "linear-gradient("+curr_gradient[0] + "deg," + curr_gradient[1] + "," + curr_gradient[2] +")";

});

document.getElementById("downArrow").addEventListener("mouseout",function() {
  document.getElementById("downArrow").style.backgroundColor = ""
  document.getElementById("downArrow").style.backgroundImage = "";
});

// this will hide the background when the user goes back
window.addEventListener("pageshow", () => {
  document.getElementById("downArrow").style.backgroundColor = ""
  document.getElementById("downArrow").style.backgroundImage = "";
});
