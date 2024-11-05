<?php
// File handling logic for saving messages to message.txt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_message'])) {
    $message = $_POST['message'];

    // Define the file path
    $filePath = "message.txt";

    // Open the file in append mode
    $myfile = fopen($filePath, "a") or die("Unable to open file!");

    // Prepare the data to write
    $data = "Message: $message\n====================\n\n";

    // Write data to the file
    fwrite($myfile, $data);
    fclose($myfile);

    // Success message
    $successMessage = "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Portfolio</title>
    <style>
        /* Reset default margins and padding */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Background and text colors */
        body {
            background: linear-gradient(135deg, #e0f7fa, #e8f5e9);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        /* Main container */
        .portfolio-container {
            max-width: 900px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
            overflow: hidden;
            transition: transform 0.2s;
            position: relative; /* Allows positioning of the logout button */
        }

        .portfolio-container:hover {
            transform: scale(1.02);
        }

        /* Header */
        .header {
            background-color: #006064;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 16px;
        }

        /* Logout button */
        .logout-button {
            background-color: #d32f2f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute; /* Fixed position */
            top: 20px;
            right: 20px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #b71c1c;
        }

        /* Profile section */
        .profile {
            display: flex;
            padding: 20px;
            align-items: flex-start;
            border-bottom: 2px solid #006064;
        }

        .profile img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Profile details */
        .details {
            background-color: #e3f2fd;
            padding: 20px;
            border-radius: 10px;
            flex-grow: 1;
        }

        .details h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #006064;
        }

        /* Content area */
        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Message section */
        .message-section {
            width: 100%;
            margin-top: 20px;
            background-color: #fff3e0;
            border: 1px solid #006064;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .message-section textarea {
            width: 100%;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            resize: none;
        }

        .message-section button {
            background-color: #006064;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .message-section button:hover {
            background-color: #004d40;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #e3f2fd;
            border-top: 2px solid #006064;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="portfolio-container">
        <header class="header">
            <h1>Doctor's Portfolio</h1>
            <p>Welcome, Dr. John Doe</p>
            <button class="logout-button">Logout</button>
        </header>

        <div class="profile">
            <img src="https://www.workitdaily.com/media-library/professional-man-creating-an-outstanding-personal-branding-statement.jpg?id=22025730&width=1200&height=800&quality=85&coordinates=77%2C0%2C77%2C0" alt="Profile Image">
            <div class="details">
                <h2>Profile Overview</h2>
                <p><strong>Name:</strong> Dr. John Doe</p>
                <p><strong>Specialization:</strong> Cardiology</p>
                <p><strong>Email:</strong> johndoe@example.com</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
            </div>
        </div>

        <div class="content">
            <div class="message-section">
                <h3>Send a Message</h3>
                <form method="POST" action="">
                    <textarea name="message" placeholder="Enter your ID and write your message..."></textarea>
                    <button type="submit" name="send_message">Send Message</button>
                </form>
                <?php if (isset($successMessage)) { echo "<p>$successMessage</p>"; } ?>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 Hospital Management System</p>
        </footer>
    </div>
</body>
</html>
