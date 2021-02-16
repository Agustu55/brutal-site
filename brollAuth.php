<?php include 'php/authenticate.php';?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/brollAuth.css">
    <title></title>
  </head>
  <body onload="loadGradient()">

    <div class="topDivider"></div>

    <div id="canvasWrapper">

      <form method="post" action="brollAuth.php" id="login-form">
        <div id="names">
          <input type="text" autocomplete="off" name="firstname" id="first-name-field" class="login-from-field" placeholder="first">
          <input type="text" autocomplete="off" name="lastname" id="last-name-field" class="login-form-field" placeholder="last">
        </div>
        <input type="tel" autocomplete="off" name="phone" id="phone-#-field" class="login-form-field" placeholder="phone #">
        <p class="mini"> <br>for authentication purposes only
        <br> i promise i won't sell it</p>
        <div id="enter">
            <!-- <p id="broll" onclick="checkInfo();">ENTER</p> -->
            <button type="submit" class="btn"
                        name="enter">
                ENTER
            </button>
        </div>

      </form>
    </div>

    <div class="bottomDivider"></div>

    <script type="text/javascript" src="js/gradients.js"></script>
    <script type="text/javascript" src="js/brollAuth.js"></script>

  </body>
</html>
