<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$dir = "Photos/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    
    $entry = "INSERT INTO 'Images' ('Image Name','Image Path') VALUES (" . $dir . "," . $file . ")";
    if (mysqli_query($connection, $entry)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $entry . "<br>" . $connection->error;
    }
    $connection->close();
    echo "File uploaded successfully";
} else {
    echo "Error uploading file";
}

