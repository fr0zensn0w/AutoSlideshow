<?php
include "../inc/dbinfo.inc";
ini_set('display_errors',1);
error_reporting(E_ALL);

//boilerplate connection to DB using dbinfo.inc
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);

//default directory
$dir = "Photos/";
//setting up filepath to that directory, probably need to check that the name isn't already used, can handle later
$file = $dir . basename($_FILES["fileToUpload"]["name"]);
$OK = 1;
$filetype = pathinfo($file,PATHINFO_EXTENSION);

//This query is for inserting just the image name and filepath to that name in our DB. 

$query = "INSERT INTO Images (ImageName, ImagePath) VALUES (\"" . basename($_FILES['fileToUPload']['name']) . "\",\"" . $file . "\")";
// echo $query;

//execute query, echo error message if it doesn't work(remove debugging in final version)
if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>" . $connection->error);

//moves the file to the correct folder in our server(needs to be ammended once actual filesystem is up and running)
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
    echo "New record created successfully";
} else {
    echo "Error uploading file";
}

//clean up connection at the end
mysqli_close($connection);
?>

