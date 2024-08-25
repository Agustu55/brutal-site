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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOME</title>

    <meta name="Keywords" content="photography, film, 35mm, analog, analogue">
    <meta name="Description" content="gus stevens is a film photographer in salt lake city, ut">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/entrance.css">

  </head>

  <body onload="randomGradient();randomImg();">
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9X36MD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

      <!-- all pics will preload everything in the img and obj directory -->
      <div id="preload">
        <?php include 'php/all_pics.php';?>
      </div>


      <!-- change the src on clicks -->
      <img onclick="randomImg();" id="hidden-content" width="100%">
      <img onclick="randomImg();" id="content" width="100%">
      
      <!-- these are the text prompts -->
      <div id="click-square">
        <p>try clicking the square!</p>
      </div>
      <div id="link">
        <a id="real" href="https://www.gusdstevens.com/real">ENTER</a>
      </div>

      <div onclick="randomImg();randomGradient();" class="square" id="square1" width=150px height=150px>
        <!-- <p id="hexText"></p> -->
      </div>

      <script type="text/javascript" src="js/gradients.js"></script>
      <script type="text/javascript" src="js/index.js"></script>

      <!-- <script type="text/javascript" src="js/index.js"></script> -->

  </body>
</html>
