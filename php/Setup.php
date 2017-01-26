<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Setup Database</h1>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  if(!TableExists("Images", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `Images` (
         `image_id` int(11) NOT NULL AUTO_INCREMENT,
         `image_name` varchar(45) DEFAULT NULL,
         `image` blob DEFAULT NULL,
         PRIMARY KEY (`ID`),
       ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}
?>
</body>
</html>
