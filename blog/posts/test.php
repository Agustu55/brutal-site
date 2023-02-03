<script>
const tz = Intl.DateTimeFormat().resolvedOptions().timeZone; // this gets the timezone from the client it is stored as (America/Denver) standard
// create a cookie after the document is ready
createCookie("tz",Intl.DateTimeFormat().resolvedOptions().timeZone, "10");

// function to create the createCookie
// Function to create the cookie
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/" + "; SameSite=None; Secure";
}
</script>

<?php
require('../php/db_comments.php');
$comment_post_id = 1;
$db = new CommentsDB();
$comments = $db->get_comments($comment_post_id);
$has_comments = (count($comments) > 0);
?>

<?php
require('../php/pusher_config.php');
?>

<script>
var APP_KEY = '<?php echo(APP_KEY); ?>';
var APP_CLUSTER = '<?php echo(APP_CLUSTER); ?>';
</script>
<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script src="../js/comment_handler.js"></script>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/post.css">
  <link rel="stylesheet" type="text/css" href="../css/comment.css">
  <title>DUMMY POST</title>
</head>

<body>

  <div class="topDivider"></div>

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

  <section id="comments" class="body">

    <h3 id="commentTitle">COMMENTS</h3>

    <ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':'’'); ?>">

    <li class="no-comments">Be the first to add a comment.</li>

    <div id="has-coments">
    <?php
      for ($i = 0; $i < count($comments); $i++) {
      ?>

      <li id="comment-<?php echo($comments[$i]['comment_id']); ?>">
        <!-- $comments is an array of all the comments. $i is the iterator of the for loop. We can use it to get the comment attributes (author date etc). The article id matches the comment id from the comments database. -->
        <article class="hentry">
          <div class="entry-content">
            <p><?php echo($comments[$i]['comment_text']); ?></p>
          </div>
          <input id="reply-button-post-<?php echo($comment_post_id); ?>-comment-<?php echo($comments[$i]['comment_id']); ?>" class="reply" name="reply" type="submit" value="reply" onclick="ShowAndHide(this.id)" />
          <address class ="vcard-author">
            <p> comment by <?php echo($comments[$i]['author']); ?> on <?php echo($comments[$i]['date']); ?> at <?php echo($comments[$i]['time']); ?></p>
          </address>
          <!-- the hidden reply fields will be here. If the user selects the reply button they will be revealed -->
          <div class="reply-div" id="reply-div-post-<?php echo($comment_post_id); ?>-comment-<?php echo($comments[$i]['comment_id']); ?>">
            <form class="reply-form" action="../php/post_comment.php" method="post" id="reply-form-post-<?php echo($comment_post_id); ?>-comment-<?php echo($comments[$i]['comment_id']); ?>">

              <label for="reply_author" class="required">Your name</label>
              <input type="text" name="reply_author" value="" tabindex="1" required="required">

              <label for="reply_email" class="required">Your email</label>
              <input type="email" name="reply_email" value="" tabindex="2" required="required">
              <label for="reply" class="required">Your message</label>
              <textarea name="reply" rows="3" tabindex="4"  required="required"></textarea>

              <input type="hidden" name="reply_post_id" value="<?php echo($comment_post_id); ?>" />
              <input type="hidden" name="parent_comment_id" value="<?php echo($comments[$i]['comment_id']); ?>" />

              <!-- when the submit reply button is pressed it will trigger the handle reply funciton and it passes in the parent comment ID. -->
              <!-- todo: put this in the post comment java script section.. might be hard since there are lots of quotes -->
              <input name="reply_submit" type="submit" value="Submit reply"/>

            </form>
          </div>
        </article>
        <!-- at the end of the first comment article there will be one more ol that is for replies -->
        <ol id="reply-list-comment-<?php echo($comments[$i]['comment_id']); ?>"></ol>
      </li>
        <?php
      }
    ?>
  </div>

    </ol>

		<div id="respond">

      <h4>Leave a comment</h4>

      <form action="../php/post_comment.php" method="post" id="commentform">

        <label for="comment_author" class="required">Your name</label>
        <input type="text" name="comment_author" id="comment_author" value="" tabindex="4" required="required">

        <label for="email" class="required">Your email</label>
        <input type="email" name="email" id="email" value="" tabindex="5" required="required">
        <label for="comment" class="required">Your message</label>
        <textarea name="comment" id="comment" rows="3" tabindex="7"  required="required"></textarea>

        <input type="hidden" name="comment_post_id" value="<?php echo($comment_post_id); ?>" id="comment_post_id" />

        <input name="submit" type="submit" value="Submit comment"/>

      </form>

    </div>

	</section>

</div>

  <div class="bottomDivider"></div>

</body>
</html>
