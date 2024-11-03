<?php 
session_start(); // Start a session to access session variables

// Check if the user is logged in as admin
/*
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Admin') {
    header("Location: login.php"); // Redirect to login if not logged in as admin
    exit();
}
*/

// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'Group11'; // Change to match your actual database name

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_staff'])) {
    $staff_id = $_POST['staff_id']; // Get the ID of the staff member to delete

    // Delete staff member from the database using a prepared statement
    $stmt = $conn->prepare("DELETE FROM staff WHERE Id = ?");
    $stmt->bind_param("i", $staff_id);

    if ($stmt->execute()) {
        $message = "Staff member deleted successfully!";
    } else {
        $message = "Error deleting staff member: " . mysqli_error($conn);
    }

    $stmt->close();
}

// Fetch current staff members
$sql = "SELECT * FROM staff";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-align: center;
            text-decoration: none;
        }
        .message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Current Staff Members</h2>

    <?php if (isset($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Action</th> <!-- New column for actions -->
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Role']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Phone_number']; ?></td>
                <td><?php echo $row['Username']; ?></td>
                <td>
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="staff_id" value="<?php echo $row['Id']; ?>">
                        <input type="submit" name="delete_staff" value="Remove" onclick="return confirm('Are you sure you want to delete this staff member?');">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="admin_dashbord.html">Back to Admin Dashboard</a>
    <a href="login2.php">Logout</a> <!-- Logout link -->
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
