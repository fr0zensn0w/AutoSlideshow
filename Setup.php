<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Sample page</h1>
<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);


  /* Ensure that the Image table exists. */
  $del = "DROP TABLE 'Images";
  mysqli_query($connection, $del);
  if(!TableExists("Images", $connection, DB_DATABASE)) 
  { 
     $query = "CREATE TABLE `Images` (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Image Name` varchar(45) DEFAULT NULL,
         `Image Path` varchar(45),
         PRIMARY KEY (`ID`),
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>" . $connection->error);
  }

  /* If input fields are populated, add a row to the Employees table. */
  //$image_path = htmlentities($_POST['Image Path']);
?>

<!-- Input form -->

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>



<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Image</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM Images"); 

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>";
  echo "</tr>";
}
?>

</table>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>


<?php


/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>