<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '1234';

   // Connect to MySQL
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if (!$conn) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   echo 'Connected successfully<br />';

   // Create the database if it doesn't exist
   $dbname = 'Group11';
   $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
   if (mysqli_query($conn, $sql)) {
      echo "Database '$dbname' created successfully<br />";
   } else {
      echo "Error creating database: " . mysqli_error($conn);
   }

   // Close the connection
   mysqli_close($conn);
?>