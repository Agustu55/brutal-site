// function to pad number with 0
function pad(num, size) {
    var s = "000000000" + num;
    return s.substr(s.length-size);
}

// function to countdown for given date and write to given elements
function countdown(date,day_id,time_id) {
  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = date - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // if distance is less than 0 everything is 0
  if (distance < 0) {
    clearInterval(this);
    days = 0;
    hours = 0;
    minutes = 0;
    seconds = 0;
  }
  // Output the result in an element with id="days"
  document.getElementById(day_id).innerHTML = pad(days,2);

  // Output the result in an element with id="time"
  document.getElementById(time_id).innerHTML =  pad(hours,2) + "h  "
  + pad(minutes,2) + "m " + pad(seconds,2) + "s";
}

// // Set the date we're counting down to
// var ski_count = new Date("Nov 25, 2020 09:00:00").getTime();
// var hike_count = new Date("Nov 23, 2020 15:30:00").getTime();
//
// var x = setInterval(countdown(ski_count,"ski_days","ski_time"),1000);
// var y = setInterval(countdown(hike_count,"hike_days","hike_time"),1000);



var ski_count = new Date("Nov 29, 2020 09:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = ski_count - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // if distance is less than 0 everything is 0
  if (distance < 0) {
    clearInterval(x);
    days = 0;
    hours = 0;
    minutes = 0;
    seconds = 0;
  }
  // Output the result in an element with id="days"
  document.getElementById("ski_days").innerHTML = pad(days,2);
  document.getElementById("ski_text").innerHTML = "days";

  // Output the result in an element with id="time"
  document.getElementById("ski_time").innerHTML =  pad(hours,2) + "h "
  + pad(minutes,2) + "m " + pad(seconds,2) + "s ";

}, 1000);


var hike_count = new Date("Nov 23, 2020 14:30:00").getTime();

// Update the count down every 1 second
var y = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = hike_count - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // if distance is less than 0 everything is 0
  if (distance < 0) {
    clearInterval(y);
    days = 0;
    hours = 0;
    minutes = 0;
    seconds = 0;
  }
  // Output the result in an element with id="days"
  document.getElementById("hike_days").innerHTML = pad(days,2);
  document.getElementById("hike_text").innerHTML = "days";

  // Output the result in an element with id="time"
  document.getElementById("hike_time").innerHTML =  pad(hours,2) + "h "
  + pad(minutes,2) + "m " + pad(seconds,2) + "s ";

}, 1000);
