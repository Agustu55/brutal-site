<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <title> gallery </title>
  </head>

  <body onload="loadGradient()">
      <script> console.log('starting gallery');</script>

      <div class="canvasWrapper">
        <div class="topdivider">
          <div class="left">
          <h3><a id="home" href="real.php">BACK</a></h3>
          </div>
          <div class="right">
          <h3><a id="reset" href="gallery.php">RESET</a></h3>
          </div>
        </div>

        <div class="imgGallery">

          <!-- run php code to createhe gallery for every image in the folder -->
          <?php include 'php/gallery_pics.php';?>


        </div>

        <div class="bottomDivider"></div>

      </div>

      <script type="text/javascript" src="js/gradients.js"></script>
      <script type="text/javascript" src="js/gallery.js"></script>

  </body>
</html>
