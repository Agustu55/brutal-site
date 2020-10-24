// hover things
document.getElementById('link').addEventListener("mouseover",function() {
  document.getElementById('link').style.backgroundColor = "#FFFF33"
  document.getElementById('link').style.backgroundImage = "linear-gradient(180deg, #FFFF33, #FF00FF)";
});

document.getElementById('link').addEventListener("mouseout",function() {
  document.getElementById('link').style.backgroundColor = ""
  document.getElementById('link').style.backgroundImage = "";
});
