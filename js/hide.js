// function to return elements with matching tags
function getElementsByMatchingId(tag,matching_string) {
  var items = [];

  var tag_items = document.getElementsByTagName(tag);
  for (var i = 0; i < tag_items.length; i++) {
    // check element ID
    item_id=tag_items[i].id;
    if (item_id.includes(matching_string)) {
      items.push(tag_items[i]);
    }
  }
  return items;
}

// redacts all of the text.. except title and rude statement
function redact() {
  console.log("hiding text");
  var text_items = getElementsByMatchingId("div","text");
  for (var i = 0; i < text_items.length; i++) {
    var id = text_items[i].id;
    // don't balck out these items
    if (["text2","text2buttons","extra_text","text13"].indexOf(id) < 0) {
      document.getElementById(id).style.background = "black";
    }
  }

  // redalcts all of the links.. except the home
  console.log("hiding links");
  var link_items = getElementsByMatchingId("a","link");
  for (var i = 0; i < link_items.length; i++) {
    var id = link_items[i].id;
    document.getElementById(id).style.background = "black";
  }

  // make sure the extra text and links are hidden
  document.getElementById("extra_links").style.display='none';
  document.getElementById("extra_text").style.display='none';
}

function redact_square() {
  console.log("blackout square");
  var squares = document.getElementsByClassName("square")
  for (var i=0; i < squares.length; i++) {
    var id = squares[i].id;
    console.log("hiding square id " + id)
    document.getElementById(id).style.background = "black";
  }
}

function unredact() {
  console.log("revealing text");
  var text_items = getElementsByMatchingId("div","text");
  for (var i = 0; i < text_items.length; i++) {
    var id = text_items[i].id;
    // don't balck out these items
    if (["text2","text2buttons","extra_text","text13"].indexOf(id) < 0) {
      document.getElementById(id).style.background = "transparent";
    }
  }

  // redalcts all of the links
  console.log("revealing links");
  var link_items = getElementsByMatchingId("a","link");
  for (var i = 0; i < link_items.length; i++) {
    var id = link_items[i].id;
    document.getElementById(id).style.background = "transparent";
  }

}

function unredact_square() {
  console.log("revealing square");
  // call this to reload squares
  setGradient();
}

// to show all images
function unblur() {
  console.log("loading new images");
  // loads the images with random components
  defaultImg();

  // loads the images that aren't randomly generated
  loadImg();

  // loads the images int the vertical imgStrip
  imgDown();

  // hides the rude text
  unredact();
  unredact_square();

}

// to switch all images
function hello() {
  console.log("blurring images");
  var imgs = document.getElementsByTagName("img");

  for (var i = 0; i < imgs.length; i++) {
    var old_src = imgs[i].src;

    if (old_src.includes("vrt")) {
      imgs[i].src = "stock/vrt1.jpg";
    } else {
      imgs[i].src = "stock/hrz1.jpg";
    }
  }
  redact();
  redact_square();
}
