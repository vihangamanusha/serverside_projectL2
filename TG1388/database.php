<?php   //Save to text data to appoinment.txt file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $phonenumber = $_POST['phoneno']; 
    $appointmentdate = $_POST['appointment_date'];
    $doctor = $_POST['doctor'];
    $description = $_POST['description'];

    
    //ihniuhiuh//
      
    $filePath = "appointment.txt";
    $myfile = fopen($filePath, "a") or die("Unable to open file!");

    $data = "Title: $title\nFirst Name: $firstname\nLast Name: $lastname\nPhone Number: $phonenumber\nAppointment Date: $appointmentdate\nDoctor: $doctor\nDescription: $description\n====================\n\n";

   
    fwrite($myfile, $data);
    fclose($myfile);

   


     $conn=new mysqli('localhost','root','801@Vihanga','oppinment');
    
     if($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
     }
     $sql = "INSERT INTO oppoinment_data (Title, Firstname, Lastname, Phonenumber, Oppoinmentdate, Doctor, Description) VALUES (?, ?, ?, ?, ?, ?, ?)";
     $stmt = $conn->prepare($sql);
     if ($stmt === false) {
         die("Error preparing statement: " . $conn->error);
     }
     
     $stmt->bind_param("sssssss", $title, $firstname, $lastname, $phonenumber, $appointmentdate, $doctor, $description);
 
     if ($stmt->execute()) {
        echo "<script>
                window.onload = function() {
                    document.getElementById('popup').classList.add('open-popup');
                };
              </script>";
        
     } else {
         echo "Error: " . $stmt->error;
     }
 
     $stmt->close();
     $conn->close();
 
    }    
?>