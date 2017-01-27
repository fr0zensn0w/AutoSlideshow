<?php
include "../../inc/dbinfo.inc";
ini_set('display_errors',1);
error_reporting(E_ALL);

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);

$query = $_POST["query"];

if(!mysqli_query($connection, $query)) {
    echo("<p>Error with query.</p>" . $connection->error);
} else {
    echo("<p>Query successful!</p>");
}

mysqli_close($connection);

?>