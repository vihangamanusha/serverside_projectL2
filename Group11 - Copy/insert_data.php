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

// Insert sample records with hashed passwords
$sql = "INSERT INTO staff (Id, Name, Role, Email, Phone_number, Username, Password) VALUES
    (001, 'Mr. Nimesh', 'Admin', 'nimesh@gmail.com', '0711234567', 'nimesh1', '" . password_hash('nimesh1', PASSWORD_DEFAULT) . "'),
    (002, 'Mr. Vihanga', 'Admin', 'vihanga@gmail.com', '0712345678', 'vihanga1', '" . password_hash('vihanga1', PASSWORD_DEFAULT) . "'),
    (003, 'Mr. Chamod', 'Receptionist', 'chamod@gmail.com', '0713456789', 'chamod1', '" . password_hash('chamod1', PASSWORD_DEFAULT) . "'),
    (004, 'Mr. Pinimal', 'Receptionist', 'pinimal@gmail.com', '0712222222', 'pinimal1', '" . password_hash('pinimal1', PASSWORD_DEFAULT) . "'),
    (005, 'Mr. Wasantha', 'Inventory Manager', 'wasantha@gmail.com', '0713333333', 'wasantha1', '" . password_hash('wasantha1', PASSWORD_DEFAULT) . "'),
    (006, 'Mr. Kumara', 'Inventory Manager', 'kumara@gmail.com', '0714444444', 'kumara1', '" . password_hash('kumara1', PASSWORD_DEFAULT) . "'),
    (007, 'Mr. Krishan', 'Record Manager', 'krishan@gmail.com', '0710000000', 'krishan1', '" . password_hash('krishan1', PASSWORD_DEFAULT) . "'),
    (008, 'Mr. Perera', 'Record Manager', 'perera@gmail.com', '0711111111', 'perera1', '" . password_hash('perera1', PASSWORD_DEFAULT) . "'),
    (009, 'Dr. George', 'Doctor', 'georage@gmail.com', '0751111111', 'd1', '" . password_hash('1111', PASSWORD_DEFAULT) . "'),
    (010, 'Dr. Devi', 'Doctor', 'devi@gmail.com', '0750000000', 'd2', '" . password_hash('2222', PASSWORD_DEFAULT) . "'),
    (011, 'Dr. Grey', 'Doctor', 'grey@gmail.com', '0750000001', 'd3', '" . password_hash('3333', PASSWORD_DEFAULT) . "'),
    (012, 'Dr. Elizabeth', 'Doctor', 'elizabeth@gmail.com', '0750000002', 'd4', '" . password_hash('4444', PASSWORD_DEFAULT) . "'),
    (013, 'Dr. Catherine', 'Doctor', 'catherine@gmail.com', '0750000003', 'd5', '" . password_hash('5555', PASSWORD_DEFAULT) . "'),
    (014, 'Dr. Ben', 'Doctor', 'ben@gmail.com', '0750000004', 'd6', '" . password_hash('6666', PASSWORD_DEFAULT) . "'),
    (015, 'Dr. Paul', 'Doctor', 'paul@gmail.com', '0750000005', 'd7', '" . password_hash('7777', PASSWORD_DEFAULT) . "'),
    (016, 'Dr. Jane', 'Doctor', 'jane@gmail.com', '0750000006', 'd8', '" . password_hash('8888', PASSWORD_DEFAULT) . "'),
    (017, 'Ms. Rose', 'Nurse', 'rose@gmail.com', '0712222223', 'n1', '" . password_hash('1212', PASSWORD_DEFAULT) . "'),
    (018, 'Ms. Lana', 'Nurse', 'lana@gmail.com', '0712222224', 'n2', '" . password_hash('1313', PASSWORD_DEFAULT) . "'),
    (019, 'Ms. Emily', 'Nurse', 'emily@gmail.com', '0712222225', 'n3', '" . password_hash('1414', PASSWORD_DEFAULT) . "'),
    (020, 'Ms. Watson', 'Nurse', 'watson@gmail.com', '0712222226', 'n4', '" . password_hash('1515', PASSWORD_DEFAULT) . "');"; // Added closing parenthesis

if (mysqli_query($conn, $sql)) {
    echo "Staff records inserted successfully<br />";
} else {
    echo "Error inserting records: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
