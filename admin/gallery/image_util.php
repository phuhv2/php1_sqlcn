<?php
function process_image($dir, $filename) {
    // Set up the variables
    $dir = $dir . DIRECTORY_SEPARATOR;
    $i = strrpos($filename, '.');
    $image_name = substr($filename, 0, $i);
    $ext = substr($filename, $i);

    $image_path = $dir . DIRECTORY_SEPARATOR . $filename;

    $image_path_400 = $dir . $image_name . '_400' . $ext;
    $image_path_100 = $dir . $image_name . '_100' . $ext;
}
?>
