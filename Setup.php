<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Setup Database</h1>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo 'Failed to connect to MySQL: ' . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  echo 'Creating table if it doesn\'t exist';

  if(!TableExists("Images", $connection, $dbName)) 
  { 
     $query = 'CREATE TABLE Images (
         image_id int(11) NOT NULL AUTO_INCREMENT,
         image_name varchar(45) DEFAULT NULL,
         image blob DEFAULT NULL,
         PRIMARY KEY (ID),
       ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';

     if(!mysqli_query($connection, $query)) echo('<p>Error creating table.</p>');
  }
}
?>

<!-- displaying table data -->
<table border="1" cellpadding="2" cellspacing="2">
    <tr>
        <td>Image ID</td>
        <td>Image Name</td>
        <td>Image Thumbnail</td>
    </tr>
<?php

$result = mysqli_query($connection, "SELECT * FROM Images");

while($query_data = mysqli_fetch_row($result)) {
    echo '<tr>';
    echo '<td>',$query_data[0],'</td>',
    echo '<td>',$query_data[1],'</td>',
    echo '<td><img src="data:image/jpeg;base64,'.base64_encode($query_data[2]).'"/>';
}
</body>
</html>
