$(function() {
  $('#commentform').submit(handleSubmit);
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

function handleSubmit() {
  console.log('comment was submitted');
  socketId = pusher.connection.socket_id;

  var form = $(this);
  var data = {
    "author": form.find('#comment_author').val(),
    "email": form.find('#email').val(),
    "comment": form.find('#comment').val(),
    "comment_post_id": form.find('#comment_post_id').val(),
    "socket_id": socketId // pass the socket id for the pusher server to exclude it
  };
  console.log(data);

  postComment(data);
  return false;
}


// this creates the ajax message that is sent to post_comment.php
function postComment(data) {
  $.ajax({
    type: 'POST',
    url: 'https://www.gusdstevens.com/blog/php/post_comment.php',
    data: data,
    // headers: {
    //   'X-Requested-With': 'XMLHttpRequest'
    // },
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
  var commentHtml = createComment(data);
  var commentEl = $(commentHtml);
  commentEl.hide();
  var postsList = $('#posts-list');
  postsList.addClass('has-comments');
  postsList.append(commentEl);
  commentEl.slideDown();
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
  '<li><article class="hentry">' +
    '<div class="entry-content">' +
      '<p>' + parse_json.comment_text + '</p>' +
    '</div>' +
    '<address class="vcard-author">' +
      '<p> comment by ' + parse_json.author +
      ' on ' + parse_json.date + ' at ' +  parse_json.time + '</p>' +
    '</address>' +
  '</article></li>';

  console.log(html)

  return html;
}
