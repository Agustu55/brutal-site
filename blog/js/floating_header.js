window.onscroll = function() {scrollFunction()};

var header = document.getElementById("header");

var sticky = header.offsetTop;

function scrollFunction() {
  console.log("scrolling in scroll function");
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
