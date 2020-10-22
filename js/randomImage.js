// these are a series of functions to load random images on the entrance page

function randomImg(){
   document.getElementById('logo').src = "obj/obj" + Math.round(Math.random()*9+1) + ".png";
   document.getElementById('content').src = "img/img" + Math.round(Math.random()*32+1) + ".jpg";
   document.getElementById('hidden-content').src = "img/hrz" + Math.round(Math.random()*11+1) + ".jpg";
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
