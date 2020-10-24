<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>gus d stevens</title>

    <meta name="Keywords" content="photography, film, 35mm, analog, analogue">
    <meta name="Description" content="gus stevens is a film photographer in salt lake city, ut">

    <link rel="stylesheet" type="text/css" href="css/entrance.css">
  </head>

  <body>

    <!-- all pics will preload everything in the img and obj directory -->
    <div id="preload">
      <?php include 'php/all_pics.php';?>
    </div>

    <!-- change the src on clicks -->
    <img onclick="randomImg()" id="hidden-content" width="100%" src="img/hrz1.jpg">
    <img onclick="randomImg()" id="content" width="100%" src="img/img2.jpg">
    <div id="text"><a href="real.html">ENTER</a></div>

    <div onclick="randomImg()" id="square" width=150px height=150px>
      <!-- <p id="hexText"></p> -->
    </div>

    <script type="text/javascript" src="js/loadRandomImg.js"></script>


  </body>
</html>
