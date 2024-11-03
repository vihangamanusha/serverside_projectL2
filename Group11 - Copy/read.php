<?php
// Read messages from the message.txt file
$messages = [];
$filePath = "message.txt";

if (file_exists($filePath)) {
    $messages = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} else {
    $messages[] = "No messages found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Read Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em; /* Increased font size */
            letter-spacing: 1px; /* Added letter spacing */
        }

        .message-container {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Enhanced shadow for depth */
            margin: 10px auto;
            width: 90%; /* Responsive width */
            max-width: 600px; /* Max width for larger screens */
            border-left: 5px solid #0056b3; /* Blue left border */
            transition: transform 0.2s; /* Animation for hover effect */
        }

        .message-container:hover {
            transform: scale(1.02); /* Slightly enlarge on hover */
        }

        .message {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            font-size: 1.1em; /* Slightly larger font for messages */
            line-height: 1.5; /* Improved line height for readability */
        }

        .message:last-child {
            border-bottom: none; /* Remove border for last message */
        }

        .no-messages {
            text-align: center;
            font-style: italic;
            color: #777;
            font-size: 1.1em; /* Slightly larger font for no messages */
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            background-color: #0056b3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 10px;
            transition: background-color 0.3s, transform 0.2s; /* Transition for hover effects */
        }

        .button:hover {
            background-color: #004494; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            color: #555;
            font-size: 0.9em; /* Slightly smaller font for footer */
        }
    </style>
</head>
<body>
    <h1>Admin Message Inbox</h1>

    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $message): ?>
            <div class="message-container">
                <div class="message"><?php echo nl2br(htmlspecialchars($message)); ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-messages">No messages to display.</p>
    <?php endif; ?>

    <div class="button-container">
        <a href="dashboard.php" class="button">Dashboard</a>
        <a href="logout.php" class="button">Logout</a>
    </div>

    <footer>
        <p>&copy; 2024 Hospital Management System</p>
    </footer>
</body>
</html>
