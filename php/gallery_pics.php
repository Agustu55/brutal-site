<?php
function console_log($output) {
	$js_code = json_encode($output);
	echo "<script> console.log(" . $js_code . ");</script>";
}

function get_images() {
	$path = 'img/';
	$images = array();
	$files = scandir($path);
	foreach($files as $file) {
		// only want hrz and vrt images
		if ((strpos($file,'hrz') !== false) || (strpos($file,'vrt') !== false))  {
			$fp = $path . $file;
			array_push($images,$fp);
		}
	}
	return $images;
}

function print_image_gallery_item($count,$img) {
	$img_num = $count + 1;
	$img_num = str_pad($img_num,2,'0',STR_PAD_LEFT);
	$img_id = "img".$img_num;
	$div_id = "div".$img_num;
	$pin_id = "pin".$img_num;
        $img_title = "PHOTO ".$img_num;
        echo "<div id='$div_id' class='imgGalleryItem'>";
				echo "<div onmouseover='revealImg(\"$img_num\")'> $img_title <img id='$pin_id' class='pin' onmousedown='toggleImage(\"$img_num\")' src='obj\pin.svg'></div>";
        echo "<img id='$img_id' class='img' src='$img'>";
        echo "</div>";
}

$image_array = get_images();


srand(0);
shuffle($image_array);


// create 4 arrays for each image gallery column
$image_columns = [[],[],[],[]];

for ($count = 0; $count < count($image_array); $count++) {
	$img=$image_array[$count];

        if ($count % 4 == 0) {
                array_push($image_columns[0],$img);
        } elseif ($count % 4 == 1) {
                array_push($image_columns[1],$img);
        } elseif ($count % 4 == 2) {
                array_push($image_columns[2],$img);
        } elseif ($count % 4 == 3) {
                array_push($image_columns[3],$img);
        }
}


// iterate through arrays to create image gallery column divs
$master_count = 0;
foreach ($image_columns as $image_column) {
	echo "<div class='imgGalleryColumn'>";
	foreach ($image_column as $img) {
		print_image_gallery_item($master_count,$img);
		$master_count++;
	}
	echo "</div>";
}
?>
