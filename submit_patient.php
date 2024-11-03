<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Patient Enrollment</title>
    <link rel="stylesheet" href="pinimalstylesheet.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form id="patientForm" action="" method="POST" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>
                <img src="https://files.jotform.com/jufs/ugurg/form_files/medical.65d592a94c9a25.07563121.png?md5=Tu0iUPKyRteh1hJO3ITTTQ&expires=1730584159" alt="Interactive Image" class="interactive-image">
            </td>
            <td>
                <h1>New Patient Enrollment</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-bottom: 2px solid black;"></td>
        </tr>
        <tr>
            <td>
                <label for="nic">National Identity Card Number:</label>
            </td>
            <td>
                <input type="text" name="nic" id="nic" required>
            </td>
        </tr>
        <tr>
            <td><label for="firstName">First Name:</label></td>
            <td><input type="text" id="firstName" name="firstName" required></td>
        </tr>
        <tr>
            <td><label for="lastName">Last Name:</label></td>
            <td><input type="text" id="lastName" name="lastName" required></td>
        </tr>
        <tr>
            <td><label for="dob">Date of Birth:</label></td>
            <td><input type="date" id="dob" name="dob" required></td>
        </tr>
        <tr>
            <td><label for="sex">Sex:</label></td>
            <td>
                <select id="sex" name="sex" required>
                    <option value="" disabled selected>Please Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="height">Height (Meter):</label></td>
            <td><input type="text" id="height" name="height" required></td>
        </tr>
        <tr>
            <td><label for="weight">Weight (Kilo grammes):</label></td>
            <td><input type="text" id="weight" name="weight" required></td>
        </tr>
        <tr>
            <td><label for="maritalStatus">Marital Status:</label></td>
            <td>
                <select id="maritalStatus" name="maritalStatus" required>
                    <option value="" disabled selected>Please Select</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="contactNumber">Contact Number:</label></td>
            <td>
                <input type="tel" id="contactNumber" name="contactNumber" placeholder="(000) 000-0000" required>
            </td>
        </tr>
        <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input type="email" id="email" name="email" placeholder="example@example.com" required></td>
        </tr>
        <tr>
            <td><label for="address">Address:</label></td>
            <td>
                <textarea id="address" name="address" rows="4" placeholder="Street Address, City, State, Postal Code" required></textarea>
            </td>
        </tr>
        <tr>
            <td><label for="medications">Taking any medications, currently?</label></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="radio" name="medications" id="myes" value="yes" required> Taking medications 
            </td>
        </tr>
            <td colspan="2">
            <input type="radio" name="medications" id="mno" value="no" required> Not Taking medications

            </td>
        <tr>
            <td colspan="2" style="border-bottom: 2px solid black;"></td>
        </tr>
        <tr>
            <td colspan="2"><h3>In case of emergency</h3></td>
        </tr>
        <tr>
            <td><label for="emergencyFirstName">Emergency Contact First Name:</label></td>
            <td><input type="text" id="emergencyFirstName" name="emergencyFirstName" required></td>
        </tr>
        <tr>
            <td><label for="emergencyLastName">Emergency Contact Last Name:</label></td>
            <td><input type="text" id="emergencyLastName" name="emergencyLastName" required></td>
        </tr>
        <tr>
            <td><label for="relationship">Relationship:</label></td>
            <td><input type="text" id="relationship" name="relationship" required></td>
        </tr>
        <tr>
            <td><label for="emergencyContactNumber">Emergency Contact Number:</label></td>
            <td>
                <input type="text" id="emergencyContactNumber" name="emergencyContactNumber" placeholder="(000) 000-0000" required>
            </td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Clear</button></td>
        </tr>
    </table>
</form>

<script>


     $(document).ready(function() {
        // Animate the image and heading when the page loads
        $(".interactive-image").fadeIn(2000); // Fade in the image over 1 second
        $("h1").delay(500).fadeIn(2000); // Fade in the heading with a delay of 500ms, over 1.5 seconds
    });



    function validateForm() {
        const requiredFields = [
            'nic', 'firstName', 'lastName', 'dob', 'sex',
            'height', 'weight', 'maritalStatus',
            'contactNumber', 'email', 'address',
            'emergencyFirstName', 'emergencyLastName', 
            'relationship', 'emergencyContactNumber'
        ];

        let valid = true;
        requiredFields.forEach(field => {
            const input = document.getElementById(field);
            if (!input.value) {
                valid = false;
                input.classList.add('error');
            } else {
                input.classList.remove('error');
            }
        });

        return valid; // Return the validation status
    }
</script>
</body>
</html>

<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cookiesAccepted = isset($_COOKIE['cookiesAccepted']);

// Set the cookie if the user has accepted cookies
if (isset($_POST['acceptCookies'])) {
    echo'cookies are added';
    // Set the cookie to expire in 30 days
    setcookie('cookiesAccepted', 'true', time() + (30 * 86400), "/"); // 30 days
    // Redirect to the same page to apply the cookie changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


// Create connection
$link = new mysqli("localhost", "root", "", "hospital_management");

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Create the database if it doesn't exist
$link->query("CREATE DATABASE IF NOT EXISTS hospital_management");

// Select the database
$link->select_db("hospital_management");

// Create the patients table if it doesn't exist
$link->query("CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nic VARCHAR(20),
    firstName VARCHAR(100),
    lastName VARCHAR(100),
    dob DATE,
    sex ENUM('male', 'female', 'other'),
    height DECIMAL(4,2),
    weight DECIMAL(4,2),
    maritalStatus ENUM('single', 'married', 'divorced', 'widowed'),
    contactNumber VARCHAR(15),
    email VARCHAR(100),
    address TEXT,
    medications ENUM('Taking medications', 'Not Taking medications'),
    emergencyFirstName VARCHAR(100),
    emergencyLastName VARCHAR(100),
    relationship VARCHAR(100),
    emergencyContactNumber VARCHAR(15)
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign POST variables
    $nic = $_POST['nic'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $maritalStatus = $_POST['maritalStatus'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $medications = isset($_POST['medications']) ? $_POST['medications'] : '';
    $emergencyFirstName = $_POST['emergencyFirstName'];
    $emergencyLastName = $_POST['emergencyLastName'];
    $relationship = $_POST['relationship'];
    $emergencyContactNumber = $_POST['emergencyContactNumber'];

    // Prepare and bind
    $stmt = $link->prepare("INSERT INTO patients (nic, firstName, lastName, dob, sex, height, weight, 
                                        maritalStatus, contactNumber, email, address, medications, 
                                        emergencyFirstName, emergencyLastName, relationship, 
                                        emergencyContactNumber) 
                            VALUES 
                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssddddssssssss", $nic, $firstName, $lastName, $dob, $sex, $height, $weight, 
                       $maritalStatus, $contactNumber, $email, $address, $medications, $emergencyFirstName, 
                       $emergencyLastName, $relationship, $emergencyContactNumber);

    // Execute the statement
    if ($stmt->execute()) {
        // Open the file to log patient data
        $file = fopen("patients.txt", "a");
        if ($file) {
            $data = "
            /////////////////////////////////////////////////////////////
            National Identity Card number: {$_POST['nic']}
            First Name: {$_POST['firstName']} 
            Last Name: {$_POST['lastName']} 
            Date Of Birth: {$_POST['dob']} 
            Sex: {$_POST['sex']} 
            Height: {$_POST['height']} 
            Weight: {$_POST['weight']} 
            Marital Status: {$_POST['maritalStatus']} 
            Contact Number: {$_POST['contactNumber']}
            Email: {$_POST['email']} 
            Address: {$_POST['address']}
            Medications: $medications 
            Emergency Contact First Name: {$_POST['emergencyFirstName']} 
            Emergency Contact Last Name: {$_POST['emergencyLastName']} 
            Relationship: {$_POST['relationship']}
            Emergency Contact Number: {$_POST['emergencyContactNumber']}\n
            //////////////////////////////////////////////////////////////
            ";

            fwrite($file, $data); // Write data to file
            fclose($file); // Close the file
        } else {
            echo "Error: Unable to open file.";
        }
    } else {
        echo "Error: " . $stmt->error; // Display error if execution fails
    }

    // Close the statement
    $stmt->close();
}




// Close the database connection
$link->close();
?>