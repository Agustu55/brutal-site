
// function to update source to a random image
function randomImg(){
   document.getElementById('logo').src = "obj/obj" + Math.round(Math.random()*9+1) + ".png";
   document.getElementById('content').src = "img/img" + Math.round(Math.random()*32+1) + ".jpg";
   document.getElementById('hidden-content').src = "img/hrz" + Math.round(Math.random()*11+1) + ".jpg";
}
