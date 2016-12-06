<?php
//@adswebwork
print '<h1>Image Json and List</h1>';
$dir = "images";
$imageObject = '{"jsonImageObject":{';
$images = '';
$count = 0;
$imageHTML = '';
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'):
                $path_parts = pathinfo($dir . '/' . $file);
                $imageHTML .= '<strong>Parts</strong>:'.$path_parts['dirname'].'<br/><strong>extension</strong>:'.$path_parts['extension'].'<br/>';
                $imageHTML .= '<strong>file name</strong>:'.$path_parts['filename'].'<br/>; <strong>base name</strong>:'.$path_parts['basename'].'<br/>';
                $imageHTML .= '<img src="'.$dir.'/'.$file.'" height="200" width="200"/>';
                $imageHTML .= '<hr/>';
                $images .= '{"image":"' . $file . '"},';
                $count++;
            endif;
        }
        closedir($dh);
    }
}
$imageObject .= '"count": "' . $count .'","src": "'.$dir.'",';
$imageObject .= '"images":[';
$imageObject .= $images;
$imageObject = rtrim($imageObject, ',');
$imageObject .= ']}}';
print $imageObject;
print '<hr/>';
print $imageHTML;
