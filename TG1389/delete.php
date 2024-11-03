<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '12345', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete record if delete button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if (!empty($_POST['supply_id'])) {
        $supply_id = $_POST['supply_id'];
        $delete_sql = "DELETE FROM supplies WHERE supply_id = ?";
        $stmt = $conn->prepare($delete_sql);
        if ($stmt) {
            $stmt->bind_param("i", $supply_id);
            $stmt->execute();
            $stmt->close();
            echo "Record deleted successfully.";
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Error: 'supply_id' is not set or is empty.";
    }
}

// Query to get all records from the supplies table
$sql = "SELECT supply_id, supply_name, category, quantity, price, expiry_date, supplier_name FROM supplies";
$result = $conn->query($sql);

if ($result === false) {
    die("Error with SQL query: " . $conn->error);
}

// Display records in an HTML table if there are any results
if ($result->num_rows > 0) {
    echo "
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>";
    echo "<table border='1' style='margin: auto; border-collapse: collapse;'>
            <tr>
                <th>Supply ID</th>
                <th>Supply Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Supplier Name</th>
                <th>Action</th>
            </tr>";

    // Fetch each row and display it in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . (!empty($row['supply_id']) ? htmlspecialchars($row['supply_id']) : '') . "</td>
                <td>" . (!empty($row['supply_name']) ? htmlspecialchars($row['supply_name']) : '') . "</td>
                <td>" . (!empty($row['category']) ? htmlspecialchars($row['category']) : '') . "</td>
                <td>" . (!empty($row['quantity']) ? htmlspecialchars($row['quantity']) : '') . "</td>
                <td>" . (!empty($row['price']) ? htmlspecialchars($row['price']) : '') . "</td>
                <td>" . (!empty($row['expiry_date']) ? htmlspecialchars($row['expiry_date']) : '') . "</td>
                <td>" . (!empty($row['supplier_name']) ? htmlspecialchars($row['supplier_name']) : '') . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='supply_id' value='" . htmlspecialchars($row['supply_id']) . "'>
                        <input type='submit' name='delete' value='Delete' onclick='return confirm(\"Are you sure you want to delete this item?\");'>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
