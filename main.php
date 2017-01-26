<?php include "../inc/dbinfo.inc"; ?>
<?php
  mysql_link = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  mysql_select_db(DB_DATABASE) or die('Could not select database');

  //Directory where we are storing images for now
  $img_dir = 'Photos';


?>
<html>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html> 


