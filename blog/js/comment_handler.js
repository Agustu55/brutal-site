$(function() {
  $('#commentform').submit(handleSubmit);
  $('.reply-form').submit(handleReply);

});

// I think this uses the config file that was required in test.php
var pusher = new Pusher(APP_KEY, {
  cluster: APP_CLUSTER,
});
var socketId = null;
var channel = pusher.subscribe('comments-1');
channel.bind('new_comment', displayComment);


pusher.connection.bind("error", function (err) {
    console.log("pusher error");
    console.log(err.error.data);
  }
);

function updateReplies() {
  console.log("updating the replies to have listeners in update replies function");
  $('.reply-form').submit(handleReply);
}

// this is the function for when the comment form is submitted. It will update some values before the form is sent
function handleSubmit() {
  console.log('comment was submitted');
  socketId = pusher.connection.socket_id;
  var data = {
    "author": document.getElementById('comment_author').value,
    "email": document.getElementById('email').value,
    "comment": document.getElementById('comment').value,
    "comment_post_id": document.getElementById('comment_post_id').value,
    "parent_comment_id": 0, // THE main comments will be 0 to signify that they are the original comment
    "socket_id": socketId // pass the socket id for the pusher server to exclude it
  };
  console.log(data);

  postComment(data);
  document.getElementById("commentform").reset() // this will reset the fields in the form
  return false;
}

// this is the function for when the submit comment buttons is pressed
function handleReply() {
  console.log('reply was submitted in the handle reply function');

  socketId = pusher.connection.socket_id;

  const replyform = new FormData(this)

  var data = {
    "author": replyform.get("reply_author"),
    "email": replyform.get("reply_email"),
    "comment": replyform.get("reply"),
    "comment_post_id": replyform.get("reply_post_id"),
    "parent_comment_id": replyform.get("parent_comment_id"),
    "socket_id": socketId // pass the socket id for the pusher server to exclude it
  };
  console.log(data);

  postComment(data);
  // close the reply forms
  HideAll();
  return false;
}


// this creates the ajax message that is sent to post_comment.php
function postComment(data) {
  $.ajax({
    type: 'POST',
    url: 'https://www.gusdstevens.com/blog/php/post_comment.php',
    data: data,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    success: postSuccess,
    error: postError
  });
}

function postSuccess(data, textStatus, jqXHR) {
  displayComment(data);
}

function postError(jqXHR, textStatus, errorThrown) {
  console.log('ERROR POSTING COMMENT')
  console.log(errorThrown)
}

function displayComment(data) {

  console.log('displaying comment');
  console.log(data)
  // get the comment data (comment parent ID, comment reply form id, comment HITML)
  var commentHtml = createComment(data);
  var commentEl = $(commentHtml[2]);

  const parentCommentID = commentHtml[0];
  const replyFormID = commentHtml[1];

  // get the comments post list and add has-comments to it. This means the blog has comments and to reveal the posts-list


  if (parentCommentID > 0){
    // this means it's a reply and needs to be added in the reply list under the parent comment
    var replyList = $('#reply-list-comment-' + parentCommentID);
    commentEl.hide();
    replyList.append(commentEl);
    commentEl.slideDown();
  } else {
    // this means the comment is a new comment. Need to apppend it
    var postsList = $('#posts-list');
    postsList.addClass('has-comments');
    commentEl.hide();
    postsList.append(commentEl);
    commentEl.slideDown();
  }

  // after I create and append the comment I need to make sure that the form event listener is setup:
  var newReplyForm = document.getElementsByTagName(replyFormID);
  console.log('adding event listener');
  console.log(replyFormID);
  newReplyForm.submit = $('#'+replyFormID).submit(handleReply);;
  console.log("added handle reply as listener to form");

}

function createComment(data) {
  console.log('data in create comment');
  console.log(data)
  var parse_json = $.parseJSON(data)
  if (parse_json == null){ // if parse_json == null it meeans that it is already a json message from the pusher so no need to parse it again
    parse_json=data;
  }
  console.log('parsed json')
  console.log(parse_json)
  var html =
  '<li id="comment-' + parse_json.comment_id + '"><article class="hentry">' +
    '<div class="entry-content">' +
      '<p>' + parse_json.comment_text + '</p>' +
    '</div>' +
    '<input id="reply-button-post-' + parse_json.post_id + '-comment-' + parse_json.comment_id + '" class="reply" name="reply" type="submit" value="reply" onclick="ShowAndHide(this.id)" />' +
    '<address class="vcard-author">' +
      '<p> comment by ' + parse_json.author +
      ' on ' + parse_json.date + ' at ' +  parse_json.time + '</p>' +
    '</address>' +
    '<div class="reply-div" id="reply-div-post-' + parse_json.post_id + '-comment-' + parse_json.comment_id + '">' +
        '<form class="reply-form" action="../php/post_comment.php" method="post" id="reply-form-post-' + parse_json.post_id + '-comment-' + parse_json.comment_id + '">' +
            '<label for="reply_author" class="required">Your name</label>' +
            '<input type="text" name="reply_author" value="" tabindex="1" required="required">' +
            '<label for="reply_email" class="required">Your email</label>' +
            '<input type="email" name="reply_email" value="" tabindex="2" required="required">' +
            '<label for="reply" class="required">Your message</label>' +
            '<textarea name="reply" rows="3" tabindex="4" required="required"></textarea>' +
            '<input type="hidden" name="reply_post_id" value="' + parse_json.post_id + '" id="reply_post_id"/>' +
            '<input type="hidden" name="parent_comment_id" value="' + parse_json.comment_id + '" id="parent_comment_id"/>' +
            '<input name="submit" type="submit" value="Submit reply" />' +
        '</form>' +
    '</div>' +
  '</article>' +
  '<ol id="reply-list-comment-' + parse_json.comment_id + '"></ol>'
  '</li>';

  console.log(html)
  html_form_id = "reply-form-post-" + parse_json.post_id + "-comment-" + parse_json.comment_id;
  return [parse_json.parent_comment_id,html_form_id, html];
}


// THE FOLLOWING FUNCTIONS WILL BE RELATED TO COMMENT REPLIES

function ShowAndHide(clicked_id) {


    var reply_button_id = clicked_id;
    var reply_form_id = clicked_id.replace("button","form") // this is to get the reply form id.
    var x = document.getElementById(reply_form_id);
    if (x.style.display == 'block') {
        x.style.display = 'none';
    } else {

        // then hide all of the other ones
        var replyDivs = document.getElementsByClassName("reply-form"),
              len = replyDivs !== null ? replyDivs.length : 0,
              i = 0;
        for(i; i < len; i++) {
          replyDivs[i].style.display = 'none';
        }

        // show the one we want
        x.style.display = 'block';

    }
}

function HideAll() {
  var replyDivs = document.getElementsByClassName("reply-form"),
        len = replyDivs !== null ? replyDivs.length : 0,
        i = 0;
  for(i; i < len; i++) {
    replyDivs[i].style.display = 'none';
    replyDivs[i].reset() // this will reset the form
  }
}


function loadReply(post_id, comment_id, parent_comment_id, email, author, comment_text, date, time) {
  console.log('loading comment reply');

  // I need to get the comment data and format it to use the displayComment(data) function
  // the data for that function needs to be like
  // {"post_id":1,"comment_id":173,"parent_comment_id":0,"email":"test@test.com","author":"gus","comment_text":"new comment. getting the data format","date":"Friday March 2023","time":"9:21 PM"}

  // using the reply data to create a reply object
  var reply = new Object();
  reply.post_id = post_id;
  reply.comment_id = comment_id;
  reply.parent_comment_id = parent_comment_id;
  reply.email = email;
  reply.author = author;
  reply.comment_text = comment_text;
  reply.date = date;
  reply.time = time;

  var replyString = JSON.stringify(reply);

  displayComment(replyString);
}
