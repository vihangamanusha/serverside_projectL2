<?php
session_start(); // Start a session to store user information

// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'Group11';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['Username']; // Correct casing
    $password = $_POST['Password']; // Correct casing

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM staff WHERE Username = ?"); // Ensure this matches your column name
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if we found a user
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['Id']; // Ensure this matches your column name
            $_SESSION['username'] = $user['Username']; // Ensure this matches your column name

            // Redirect to the user's specific dashboard based on role or username
            switch ($user['Role']) { // Assuming 'Role' column exists in your staff table
                case 'Admin':
                    header("Location: dashboard.html");
                    break;
                case 'Doctor':
                    header("Location: doctor.php"); // Adjust as necessary
                    break;
                case 'Nurse':
                    header("Location: nurse.php"); // Adjust as necessary
                    break;
                case 'Inventory Manager':
                    header("Location: inventory_manager_dashboard.php");
                    break;
				case 'Receptionist':
                    header("Location: inventory_manager_dashboard.php");
                    break;
				case 'Record Manager':
                    header("Location: inventory_manager_dashboard.php");
                    break;
                default:
                    header("Location: default_dashboard.php");
                    break;
            }
            exit(); // Exit to ensure no further code is executed
        } else {
            // Password is incorrect
            $error = "Invalid username or password.";
        }
    } else {
        // No user found with that username
        $error = "Invalid username or password.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Style for the background image */
        body {
            background-image: url('https://t3.ftcdn.net/jpg/09/65/78/48/360_F_965784867_hxAGyRUpLav7DBluSRqSaA8AlqqThwls.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Centered login form */
        .login-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007BFF; /* Highlight border on focus */
            outline: none;
        }

        input[type="submit"] {
            background-color: #007BFF; /* Button color */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker button color on hover */
            transform: translateY(-2px); /* Lift effect */
        }

        /* Error message styling */
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
    <script>
        function validateForm() {
            var username = document.forms["loginForm"]["Username"].value; // Ensure the name matches the input
            var password = document.forms["loginForm"]["Password"].value; // Ensure the name matches the input
            var valid = true;

            // Clear previous error messages
            document.getElementById("usernameError").innerText = "";
            document.getElementById("passwordError").innerText = "";

            if (username == "") {
                document.getElementById("usernameError").innerText = "Username must be filled out.";
                valid = false;
            }

            if (password == "") {
                document.getElementById("passwordError").innerText = "Password must be filled out.";
                valid = false;
            }

            return valid; // Return true if the form is valid
        }
    </script>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form name="loginForm" action="" method="POST" onsubmit="return validateForm();">
            <label for="username">Username:</label>
            <input type="text" id="username" name="Username"> <!-- Ensure this matches the form name -->
            <span id="usernameError" class="error"></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="Password"> <!-- Ensure this matches the form name -->
            <span id="passwordError" class="error"></span>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
