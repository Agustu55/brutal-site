<?php
function console_log($output) {
	$js_code = json_encode($output);
	echo "<script> console.log(" . $js_code . ");</script>";
}

$img_num=1;
$path = 'broll/';
$files = scandir($path);
foreach($files as $file) {
	if($file !== "." && $file !== "..") {
		console_log("loading image '$img_num'");
		$fp = $path . $file;
		$img_id = "img".$img_num;
		$div_id = "img".$img_num."div";
		echo "<div id='$div_id'>";
		echo "<img id='$img_id'src='$fp'>";
		echo "</div>";
		$img_num++;
	}
}

?>
