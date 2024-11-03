
<?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '12345', 'hospital_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "sucsusful";
    }

    // Insert new item into the database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $supply_id = $_POST['supply_id'];
        $name = $_POST['supply_name'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $expiry_date = $_POST['expiry_date'];
        $supplier_name = $_POST['supplier_name'];

        $sql = "INSERT INTO supplies (supply_id, supply_name, category, quantity, price, expiry_date, supplier_name) 
        VALUES ( '$supply_id', '$name', '$category', '$quantity', '$price', '$expiry_date', '$supplier_name')";

        if ($conn->query($sql) === TRUE) {
            echo "New item added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
