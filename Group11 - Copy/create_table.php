<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '1234';
   $dbname = 'Group11';

   // Connect to MySQL and select the database
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   if (!$conn) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   echo 'Connected to database<br />';

   // Create the `staff` table
   $sql = "CREATE TABLE IF NOT EXISTS staff (
       Id INT(6) PRIMARY KEY,
       Name VARCHAR(100),
       Role VARCHAR(30),
       Email VARCHAR(50),
       Phone_number VARCHAR(15),
       Username VARCHAR(30),
       Password VARCHAR(255) 
   )";

   if (mysqli_query($conn, $sql)) {
      echo "Table 'staff' created successfully<br />";
   } else {
      echo "Error creating table: " . mysqli_error($conn);
   }

   // Close the connection
   mysqli_close($conn);
?>
