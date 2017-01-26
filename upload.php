<?php
include "../inc/dbinfo.inc";
ini_set('display_errors',1);
error_reporting(E_ALL);

/* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);
$dir = "Photos/";
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);

//echo basename($_FILES['fileToUpload']['name']);
echo $file;

$query = "INSERT INTO Images (ImageName, ImagePath) VALUES (dummy," . $file . ")";

if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>" . $connection->error);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    echo "New record created successfully";
} else {
    echo "Error uploading file";
}

?>

