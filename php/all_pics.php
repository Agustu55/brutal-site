<?php
  $path = 'img/';
  $files = scandir($path);
  foreach($files as $file) {
  if($file !== "." && $file !== "..") {
    $fp = $path . $file;
    echo "<img src='$fp' />";
  }
}
?>
