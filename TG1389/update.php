<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '12345', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted and supply_id is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate that each required field is set and not empty
    $supply_id = isset($_POST['supply_id']) ? $_POST['supply_id'] : null;
    $supply_name = isset($_POST['supply_name']) ? $_POST['supply_name'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
    $price = isset($_POST['price']) ? $_POST['price'] : 0.0;
    $expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '';
    $supplier_name = isset($_POST['supplier_name']) ? $_POST['supplier_name'] : '';

    // Proceed only if supply_id is not null
    if ($supply_id !== null) {
        // Prepare update statement
        $update_sql = "UPDATE supplies SET supply_name = ?, category = ?, quantity = ?, price = ?, expiry_date = ?, supplier_name = ? WHERE supply_id = ?";
        $stmt = $conn->prepare($update_sql);
        
        if ($stmt) {
            $stmt->bind_param("ssidsis", $supply_name, $category, $quantity, $price, $expiry_date, $supplier_name, $supply_id);

            if ($stmt->execute()) {
                echo "<p style='color: green;'>Record updated successfully.</p>";
            } else {
                echo "<p style='color: red;'>Error updating record: " . $stmt->error . "</p>";
            }
            
            $stmt->close();
        } else {
            echo "<p style='color: red;'>Statement preparation failed: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Supply ID is missing or invalid.</p>";
    }
}

// Query to display all records from the supplies table
$sql = "SELECT * FROM supplies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='width: 80%; margin: 20px auto; border-collapse: collapse;'>
            <tr style='background-color: #4CAF50; color: #ffffff;'>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supply ID</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supply Name</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Category</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Quantity</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Price</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Expiry Date</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supplier Name</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <form method='POST' action=''>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='hidden' name='supply_id' value='" . htmlspecialchars(isset($row['supply_id']) ? $row['supply_id'] : '') . "'>" . htmlspecialchars(isset($row['supply_id']) ? $row['supply_id'] : 'N/A') . "
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='text' name='supply_name' value='" . htmlspecialchars(isset($row['supply_name']) ? $row['supply_name'] : '') . "'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='text' name='category' value='" . htmlspecialchars(isset($row['category']) ? $row['category'] : '') . "'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='number' name='quantity' value='" . htmlspecialchars(isset($row['quantity']) ? $row['quantity'] : '') . "'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='number' name='price' value='" . htmlspecialchars(isset($row['price']) ? $row['price'] : '') . "' step='0.01'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='date' name='expiry_date' value='" . htmlspecialchars(isset($row['expiry_date']) ? $row['expiry_date'] : '') . "'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='text' name='supplier_name' value='" . htmlspecialchars(isset($row['supplier_name']) ? $row['supplier_name'] : '') . "'>
                </td>
                <td style='padding: 8px; border: 1px solid #ddd;'>
                    <input type='submit' value='Update' style='padding: 5px 10px; background-color: #3498db; color: #fff; border: none; cursor: pointer; border-radius: 5px;'>
                </td>
                </form>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

// Close the database connection
$conn->close();
?>
