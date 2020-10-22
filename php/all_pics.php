<?php
  $path = 'images/';
  $files = scandir($path);
  foreach($files as $file) {
  if($file !== "." && $file !== "..") {
    $fp = $path . $file;
    echo "<img src='$fp' />";
  }
}
?>
