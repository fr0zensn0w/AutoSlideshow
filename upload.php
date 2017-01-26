<?php
$dir = "Photos/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    echo "File uploaded successfully";
    $entry = "INSERT INTO 'Images' ('Image Name','Image Path') VALUES (
        " . basename($_FILES["fileToUpload"]["name"]) . "," . $file . ")";
    if ($connection->query($entry) === TRUE) {
        echo "NEw record created successfully";
    } else {
        echo "Error: " . $entry . "<br>" . $connection->error;
    }
    $connection->close();
} else {
    echo "Error uploading file";
}

