<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/brollAuth.css">
    <title>AUTH</title>

    <!-- this prevents the page from sending messages on refresh. todo fix by including Post/Redirect/Get pattern. http://en.wikipedia.org/wiki/Post/Redirect/Get -->
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

  </head>


    <div class="topDivider"></div>

    <div id="canvasWrapper">

      <form method="post" action="brollAuth.php" id="login-form">
        <div id="names">
          <input type="text" autocomplete="off" name="firstname" id="first-name-field" class="login-from-field" placeholder="first" value="<?php echo htmlspecialchars($_POST['firstname']);?>">
          <input type="text" autocomplete="off" name="lastname" id="last-name-field" class="login-form-field" placeholder="last" value="<?php echo htmlspecialchars($_POST['lastname']);?>">
        </div>
        <input type="tel" autocomplete="off" name="phone" id="phone-#-field" class="login-form-field" placeholder="phone #" value="<?php echo htmlspecialchars($_POST['phone']);?>">
        <p class="mini"> <br>for authentication purposes only
        <br> i promise i won't sell it</p>
        <div id="enter">
            <button id= type="submit" class="btn"
                        name="enter">
                <p id="brollButton"> ENTER </p>
            </button>
        </div>
        <!-- <input type="submit" style="display:none"/> -->

      </form>

    <?php include 'php/authenticate.php';?>
    <div class="bottomDivider"></div>

    <script type="text/javascript" src="js/gradients.js"></script>
    <script type="text/javascript" src="js/brollAuth.js"></script>

  </body>
</html>
