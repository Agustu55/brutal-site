var filter = [];

// codes for 0
const keypadZero = 48;
const numpadZero = 96;

//add key codes for digits 0 - 9 into this filter
for(var i = 0; i <= 9; i++){
  filter.push(i + keypadZero);
  filter.push(i + numpadZero);
}

//add other keys that might be needed for navigation
//or for editing the keyboard input
filter.push(8);     //backspace
filter.push(9);     //tab
filter.push(46);    //delete
filter.push(37);    //left arrow
filter.push(39);    //right arrow

function onKeyDown(e){
  if(filter.indexOf(e.keyCode) < 0){
    e.preventDefault();
    return false;
  }
}


function formatPhoneText(value){
  value = value.replaceAll("-","");
  value = value.substring(0,10);

  if (value.length > 3 && value.length <= 6)
    value = value.slice(0,3) + "-" + value.slice(3);
  else if (value.length > 6 && value.length <= 10)
    value = value.slice(0,3) + "-" + value.slice(3,6) + "-" + value.slice(6);

  return value;
}


function onKeyUp(e){
  var input = e.target;
  var formatted = formatPhoneText(input.value);
  input.value = formatted;
}


var phoneField = document.getElementById("phone-#-field");
phoneField.addEventListener("keydown", onKeyDown);
phoneField.addEventListener("keyup", onKeyUp);

// this function will verify the user based on the name and phone # provided in the auth page
function checkInfo() {
  var first = document.getElementById("first-name-field").value;
  var last = document.getElementById("last-name-field").value;
  var phone = document.getElementById("phone-#-field").value;



  console.log("authorizing user")
  console.log("first name: " + first)
  console.log("last name: " + last)
  console.log("phone #: " + phone)
}


// code to modify hover elements
var links=["broll"]
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
