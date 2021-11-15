<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-206931718-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-206931718-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K9X36MD');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <title>GALLERY</title>
  </head>

  <body onload="loadGradient()">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9X36MD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
