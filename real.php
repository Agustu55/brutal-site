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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GUS STEVENS</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/real.css">

  </head>
  <body onload="setGradient();defaultImg();loadImg();imgDown();imgDown();" onresize="hideExtraLinks();">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9X36MD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- all pics will preload everything in the img and obj directory -->
    <div id="preload">
      <?php include 'php/all_pics.php';?>
    </div>

    <div id="canvasWrapper">
      <div id="img1div">
        <img id="img1">
      </div>

      <div id="text1">
        <p>buy a print pls</p>
      </div>

      <div id="link1">
        <h3><a id="home_link" href="index.php">HOME</a></h3>
      </div>

      <div id="text2">
        <h3> GUS STEVENS </h3>
        <p> photographer...
        </p>
        <br>
        <div id="text2buttons">
          <p>
            <input type="radio" name="yes_no" onclick="unblur();" checked>yes</input>
            <input type="radio" name="yes_no" onclick="hello();">no</input>
          </p>
        </div>
      </div>

      <div id="blogLink">
        <h3><a id="blog_link" href="/blog/main.html">BLOG</a></h3>
      </div>

      <!-- these links are for the mobile website -->
      <div id="link3">
        <a id="mobile_print_link" href="https://gusdstevens.darkroom.tech/">prints</a>
      </div>
      <div id="link4">
        <a id="mobile_about_link" href="about.html">about</a>
      </div>
      <div id="link5">
        <a id="mobile_home_link" href="index.php">home</a>
      </div>

      <div class="square" id="square1" onclick="randomImg('img1');"></div>
      <div id="img2div">
        <img id="img2">
      </div>
      <div id="img3div">
        <img id="img3">
      </div>
      <div id="img4div">
        <img id="img4">
      </div>

      <div id="text3">
        <p>a digital collection of analog stuff</p>
      </div>

      <div id="img5div">
        <img id="img5">
      </div>


      <!-- these are images 3,4,5 but as links for the mobile version -->
      <div id="mobile_img3div">
        <a href="https://gusdstevens.darkroom.tech/">
          <img id="mobile_img3">
        </a>
      </div>
      <div id="mobile_img4div">
        <a href="about.html">
          <img id="mobile_img4">
        </a>
      </div>
      <div id="mobile_img5div">
        <a href="index.php">
          <img id="mobile_img5">
        </a>
      </div>

      <div id="mobile_blog_gallery">
          <a id="mobile_blog_link" href="blog/main.html">blog</a>
          <a id="mobile_gallery_link" href="gallery.php">gallery</a>
      </div>


      <div id="link2">
        <h3><a id="gallery_link" href="gallery.php">GALLERY</a></h3>
      </div>

      <div id="text4">
        <p>if you're hardcore film only</p>
        <b><a id="analog_link" href="analog.html">CLICK HERE</a></b>
        <p>for the
          <br>
          analog website</p>
      </div>



      <div class="imgContainer" id="imgContaner1">
        <div class="imgContainerDiv" id="img6div">
          <img id="img6">
          <div class="square" id="square2" onclick="randomImg('img6');"></div>
        </div>

        <div class="imgContainerDiv" id="img7div">
          <img id="img7">
          <div class="square" id="square3" onclick="randomImg('img7');"></div>
        </div>

        <div class="imgContainerDiv" id="img8div">
          <img id="img8">
          <div class="square" id="square4" onclick="randomImg('img8');"></div>
        </div>
      </div>


      <!-- this is an extra row of 3 for the mobile version of the page -->
      <div class="imgContainer" id="imgContaner2">
        <div class="imgContainerDiv" id="img26div">
          <img id="mobile_img26">
          <div class="square" id="square2" onclick="randomImg('img26');"></div>
        </div>

        <div class="imgContainerDiv" id="img27div">
          <img id="mobile_img27">
          <div class="square" id="square3" onclick="randomImg('img27');"></div>
        </div>

        <div class="imgContainerDiv" id="img28div">
          <img id="mobile_img28">
          <div class="square" id="square4" onclick="randomImg('img28');"></div>
        </div>
      </div>

      <div class="imgContainer">
        <div id="img9div">
          <div id="linkContainer1">
            <h3><a id="prints11_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints12_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints13_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints14_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints15_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints16_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints17_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints18_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints19_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints110_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints111_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints112_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
          </div>

          <div id="linkContainer2">
            <h3><a id="prints21_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints22_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints23_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints24_link" href="about.html">ABOUT</a></h3>
            <h3><a id="prints25_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints26_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints27_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints28_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints29_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints210_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints211_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
            <h3><a id="prints212_link" target="_blank" href="https://gusdstevens.darkroom.tech/">PRINTS</a></h3>
          </div>
          <img id="img9">

          <div id="text5">
            <p>i need to sell at least 1 print
            <br>
            to pay for the cloud</p>
          </div>

        </div>
      </div>

      <div class="imgContainer">
        <div class="imgContainerDiv" id="img10div">
          <div class="square" id="square5" onclick="randomImg();"></div>
          <img id="img10">

          <div class="imgStrip">
            <div class="imgStripDiv" id="img12div">
              <img id="img12" onclick="switchImg('img10','img12');">
              <div class="square" id="square9" onclick="randomImg('img12');"></div>
            </div>

            <div class="imgStripDiv" id="img13div">
              <img id="img13" onclick="switchImg('img10','img13');">
              <div class="square" id="square10" onclick="randomImg('img13');"></div>
            </div>

            <div class="imgStripDiv" id="img14div">
              <img id="img14" onclick="switchImg('img10','img14');">
              <div class="square" id="square11" onclick="randomImg('img14');"></div>
            </div>
            <div class="imgStripDiv" id="img15div">
              <img id="img15" onclick="switchImg('img10','img15');">
              <div class="square" id="square12" onclick="randomImg('img15');"></div>
            </div>


            <!-- these should be hidden in the desktop one -->
            <div class="imgStripDiv" id="mobile_img24div">
              <img id="mobile_img24" onclick="switchImg('img10','mobile_img24');">
            </div>
            <div class="imgStripDiv" id="mobile_img25div">
              <img id="mobile_img25" onclick="switchImg('img10','mobile_img25');">
            </div>
          </div>

        </div>

        <div class="imgContainerDiv" id="img11div">
          <img id="img11">
        </div>
      </div>

      <div id="img16div">
        <img id="img16">
        <div id="text6">
          <p class="mini">
            *technically*
          </p>
          <p>
            you can have any image here
            <br>
            <b><em>FOR FREE</em></b>
            in 500px by 754px
            <br>
            <br>
            but then you are a pirate
          </p>
        </div>
        <div class="square" id="square6" onclick="randomImg('img16');"></div>
      </div>

      <div id="img17div">
        <div id="text7">
          <p>
            you can also have any image here
            <br>
            <b><em><a id="ten_link" target="_blank" href="https://gusdstevens.darkroom.tech/">FOR $15</a></em></b>
            printed on paper
            <br>
            <br>
            and NOT illegally downloaded
          </p>
        </div>

        <div id="text8">
            <p>
              all images captured by me
            </p>
        </div>

        <div id="text9">
            <p>
              in random places
            </p>
        </div>
        <!-- <div class="square" id="square6" onclick="randomImg('img17');randomGradient();"></div> -->
        <img id="img17">
      </div>

        <div id="text10">
            <p>
              if you see me taking pictures,
              <br>
              please know
            </p>
            <ul>
              <li>i am not being sus</li>
              <li>if you ask what i'm doing i will say the light is good</li>
              <li>the light may not be good</li>
            </ul>
        </div>



      <div class="vrtImgStrip">
        <div class="imgStripDiv" id="img12div">
          <img id="img18">
        </div>

        <div class="imgStripDiv" id="img13div">
          <img id="img19">
        </div>

        <div class="imgStripDiv" id="img14div">
          <img id="img20">
        </div>

        <div class="imgStripDiv" id="img14div">
          <img id="img21">
          <div class="square" id="square7" onclick="imgDown();"></div>
        </div>
      </div>




      <div id="img22div">
        <img id="img22">
        <div class="square" id="square8" onclick="randomImg();"></div>
      </div>

      <div id="endText">
        <div id="text11">
          <p> that's all. thanks for visiting.</p>
        </div>

        <div id="seemore">
          <div id="text12">
            <div>
            <p> unless you want to see some  more</p>
            </div>
          </div>
          <div>
            <h1 id="downArrow" onclick="showExtraLinks();scrollDown();">&#10142;</h1>
          </div>
        </div>
      </div>


      <div id="img23div">
        <img id="img23">
      </div>

      <!-- these are a bunch of extra images for the mobile version -->
      <div>
        <img id="mobile_img29">
      </div>
      <div>
        <img id="mobile_img30">
      </div>
      <div>
        <img id="mobile_img31">
      </div>
      <div>
        <img id="mobile_img32">
      </div>
      <div>
        <img id="mobile_img33">
      </div>
      <div>
        <img id="mobile_img34">
      </div>
      <div>
        <img id="mobile_img35">
      </div>
      <div>
        <img id="mobile_img36">
      </div>
      <div>
        <img id="mobile_img37">
      </div>
      <div>
        <img id="mobile_img38">
      </div>



      <div id="extra_text">
        <div>
          <h2>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            |<br>
            &#9660;
           </h2>
        </div>
      </div>


      <!-- image strip that is at the VERY bottom with cool stuff -->
      <div class="imgContainer" id="extra_links">
        <div class="imgContainerDiv" id="instadiv">
          <a target="_blank" href="https://www.instagram.com/gus.stevens/">
            <img id="insta_pic">
          </a>
          <a class="tiny" id="insta" target="_blank" href="https://www.instagram.com/gus.stevens/">insta</a>
        </div>

        <div class="imgContainerDiv" id="vscodiv">
          <a target="_blank" href="https://vsco.co/gus-stevens/gallery">
            <img id="vsco_pic">
          </a>
          <a class="tiny" id="vsco" target="_blank" href="https://vsco.co/gus-stevens/gallery">vsco</a>
        </div>

        <div class="imgContainerDiv" id="brolldiv">
          <a href="brollAuth.php">
            <img id="broll_pic">
          </a>
          <a class="tiny" id="broll" target="_blank" href="brollAuth.php">broll</a>
        </div>
      </div>

      <div id="text13">
        <div>
          <!-- <p> it's just links &colon;&#41;</p> -->
          <p></p>
          <br>
          <br>
          <br>
          <!-- <p> if you are underwhelmed i understand <br> and here is a link back to the top</p> -->
          <p></p>
          <p class="tiny" onclick="up();"> top </p>

        </div>
      </div>

      <div id="mobile_notes">
        <div>
          <a class="tiny" id="insta" href="https://www.instagram.com/gus.stevens/">insta</a>
        </div>
        <div>
          <a class="tiny" id="vsco"  href="https://vsco.co/gus-stevens/gallery">vsco</a>
        </div>
        <div>
          <a class="tiny" id="broll" href="brollAuth.php">broll</a>
        </div>

      </div>


    </div>



    <!-- script for smooth scrolling -->
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script type="text/javascript" src="js/gradients.js"></script>
    <script type="text/javascript" src="js/real.js"></script>
    <script type="text/javascript" src="js/hide.js"></script>

    <!-- <script type="text/javascript" src="js/real.js"></script> -->

  </body>
</html>
