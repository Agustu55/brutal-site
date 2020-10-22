<?php
  $path = 'obj/';
  $files = scandir($path);
  foreach($files as $file) {
  if($file !== "." && $file !== "..") {
    $fp = $path . $file;
    echo "<img src='$fp' />";
    // echo "<link rel='preload' as='image' href='$fp'>"
  }
}
?>
