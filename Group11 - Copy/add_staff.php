<?php
session_start(); // Start a session to access session variables

// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'Group11';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

// Handle adding new staff
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_staff'])) {
    // Retrieve input values
    $id = $_POST['id']; // Make sure to provide an ID
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert new staff member into the database
    $sql = "INSERT INTO staff (Id, Name, Role, Email, Phone_number, Username, Password) VALUES ('$id', '$name', '$role', '$email', '$phone', '$username', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "New staff member added successfully!";
    } else {
        $message = "Error adding staff member: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(''); /* Replace with your image path */
            background-size: cover; /* Cover the entire page */
            color: #333;
            margin: 20px;
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
        form {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 15px; /* Reduced padding */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Set a max width for the form */
            margin: auto; /* Center the form */
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] { /* Added for ID input */
            width: 95%; /* Full width */
            padding: 8px; /* Reduced padding */
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"],
        input[type="button"] {
            margin-top: 10px;
            padding: 8px 12px; /* Reduced padding */
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        input[type="submit"]:hover,
        input[type="button"]:hover { /* Hover effect for buttons */
            background-color: #0056b3;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-align: center; /* Center the logout link */
            text-decoration: none; /* Remove underline from links */
        }
        a:hover {
            text-decoration: underline; /* Optional: underline on hover */
        }
        .message {
            margin: 20px 0; /* Space above and below the message */
            color: green; /* Color for success messages */
            font-weight: bold; /* Make the message bold */
            text-align: center; /* Center the text */
        }
    </style>
</head>
<body>
    <h2>Add New Staff Member</h2>
    <div class="message">
        <?php if (isset($message)) { echo $message; } ?>
    </div>
    
    <form action="" method="POST">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required> <!-- Input for ID -->

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="add_staff" value="Add Staff">
        <input type="button" value="Clear" onclick="this.form.reset();"> <!-- Clear button -->
    </form>

    <a href="admin_dashbord.html">Back to Admin Dashboard</a>
    <a href="login2.php">Logout</a> <!-- Logout link -->
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
