<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '12345', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all records from the supplies table
$sql = "SELECT * FROM supplies";
$result = $conn->query($sql);

// Display records in an HTML table if there are any results
if ($result->num_rows > 0) {
    // Add CSS styles for the table
    echo "
    <style>
        body {
            background-color: #f0f0f0; /* Light grey background */
            font-family: Arial, sans-serif; /* Font style */
        }
        table {
            margin: 20px auto; /* Center the table */
            border-collapse: collapse; /* Collapse borders */
            width: 80%; /* Set table width */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Add shadow */
        }
        th, td {
            border: 1px solid #ddd; /* Border color */
            padding: 12px; /* Cell padding */
            text-align: center; /* Center text */
        }
        th {
            background-color: #4CAF50; /* Green background for header */
            color: white; /* White text color for header */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }
        tr:hover {
            background-color: #ddd; /* Highlight row on hover */
        }
    </style>";

    echo "<table>
            <tr>
                <th>Supply ID</th>
                <th>Supply Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Supplier Name</th>
            </tr>";
    
    // Fetch each row and display it in the table
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . ($row['supply_id'] ?? 'N/A') . "</td>
                <td>" . ($row['supply_name'] ?? 'N/A') . "</td>
                <td>" . ($row['Category'] ?? 'N/A') . "</td>
                <td>" . ($row['Quantity'] ?? 'N/A') . "</td>
                <td>" . ($row['Price'] ?? 'N/A') . "</td>
                <td>" . ($row['Expiry_date'] ?? 'N/A') . "</td>
                <td>" . ($row['supplier_name'] ?? 'N/A') . "</td>
              </tr>";
    }
              
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
