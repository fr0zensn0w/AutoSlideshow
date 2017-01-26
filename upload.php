<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$dir = "Photos/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
echo $file;
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);
echo $filetype;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    echo "File uploaded successfully";
} else {
    echo "Error uploading file";
}

