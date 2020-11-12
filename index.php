<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GUS STEVENS</title>

    <meta name="Keywords" content="photography, film, 35mm, analog, analogue">
    <meta name="Description" content="gus stevens is a film photographer in salt lake city, ut">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/entrance.css">

  </head>

  <body onload="randomGradient();randomImg();">
    <!-- all pics will preload everything in the img and obj directory -->
    <div id="preload">
      <?php include 'php/all_pics.php';?>
    </div>

    <!-- change the src on clicks -->
    <img onclick="randomImg();" id="hidden-content" width="100%">
    <img onclick="randomImg();" id="content" width="100%">
    <div id="link">
      <a id="real" href="real.php">ENTER</a>
    </div>

    <div onclick="randomImg();randomGradient();" class="square" id="square1" width=150px height=150px>
      <!-- <p id="hexText"></p> -->
    </div>

    <script type="text/javascript" src="js/gradients.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

    <!-- <script type="text/javascript" src="js/index.js"></script> -->

  </body>
</html>
