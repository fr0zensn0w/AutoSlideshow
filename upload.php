<?php
$dir = "Photos/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    echo "File uploaded successfully";
} else {
    echo "Error uploading file";
}

