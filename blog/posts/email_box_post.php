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
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/post.css">
  <link rel="stylesheet" type="text/css" href="../css/email_entry.css">
  <title>MY JOURNEY INTO FILM</title>

  <!-- this prevents the page from sending messages on refresh. todo fix by including Post/Redirect/Get pattern. http://en.wikipedia.org/wiki/Post/Redirect/Get -->
  <script>
  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }
  </script>

</head>


<body>

  <div class="topDivider">
    <div class="left">
      <h3>POST 001</h3>
    </div>

    <div class="right">
      <h3>SIGN UP FOR POST NOTIFICATIONS</h3>
      <div id="signup_form">
        <form id="email_form" method="post" name="postnotificationform" action="email_box_post.php">
          <input id="email_field" type="text" name="email" placeholder="enter email" autocomplete="off" value="<?php echo htmlspecialchars($_POST['email']);?>">
          
          <div id="submit_btn">
            <button type="submit" class="btn" name="enter">
              <p id="blogButton"> SUBMIT </p>
            </button>
          </div>
        </form>
        <?php include '../php/blog_email.php';?>
      </div>
    </div>

  </div>



  <div class="canvasWrapper">

  <p class="title">NEW POST</p>
  <p class="date">December 26 2021</p>
  <p>
    THIS IS JUST A DUMMY POST. THERE ARE NO PICTURES OR WORDS

    These are just random words

    adfadfadfa
    dfasd
    fa
    adfafg
    gasdgagagg
    adsdad

    agadga
    agdadgasg

    asdgaveegegasdgadsga
    babrerberafg
    adfadfasgsdgsd

    adgasgd
  </p>

  <figure>
    <img src="../img/5/img-106.jpg">
    <figcaption> dummy picture </figcaption>
  </figure>

  <p class="footer" >
    More of my things
    <br>
    <br>
    <a target="_blank" href="https://www.instagram.com/gus.stevens/">instagram</a>
    <br>
    <a target="_blank" href="https://www.gusdstevens.com/">website</a>
    <br>
    <a href="../archive.html">archive</a>
  </p>

  <div class="bottomDivider"></div>

</body>
</html>
