<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '12345', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select items with quantity less than 20
$low_stock_sql = "SELECT supply_id, supply_name, category, quantity, price, expiry_date, supplier_name FROM supplies WHERE quantity < 20";
$result = $conn->query($low_stock_sql);

// Display low stock items in a table
if ($result->num_rows > 0) {
    echo "<h3 style='color: #e74c3c; font-family: Arial, sans-serif; text-align: center;'>Low Stock Items (Quantity < 20)</h3>";
    echo "<table style='width: 80%; margin: 20px auto; border-collapse: collapse; background-color: #f8f8f8; font-family: Arial, sans-serif;'>
            <tr style='background-color: #4CAF50; color: #ffffff;'>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supply ID</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supply Name</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Category</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Quantity</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Price</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Expiry Date</th>
                <th style='padding: 10px; border: 1px solid #ddd;'>Supplier Name</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='text-align: center;'>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['supply_id']) . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['supply_name']) . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . (!empty($row['category']) ? htmlspecialchars($row['category']) : 'N/A') . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . (!empty($row['quantity']) ? htmlspecialchars($row['quantity']) : 'N/A') . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . (!empty($row['price']) ? htmlspecialchars($row['price']) : 'N/A') . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . (!empty($row['expiry_date']) ? htmlspecialchars($row['expiry_date']) : 'N/A') . "</td>
                <td style='padding: 8px; border: 1px solid #ddd;'>" . (!empty($row['supplier_name']) ? htmlspecialchars($row['supplier_name']) : 'N/A') . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: #e74c3c; font-family: Arial, sans-serif; text-align: center;'>No low stock items found.</p>";
}

// Close the database connection
$conn->close();
?>
