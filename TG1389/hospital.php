<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
        body {
            background-image: url('https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?t=st=1730398247~exp=1730401847~hmac=59b12ab8f90ae7979e6dcf1b87c494c004f6c035c9023b639eaccb597edda024&w=996');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 20px;
        }
        .form-label {
            color: black; /* Ensures labels are visible */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hospital Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Inventory Management Dashboard</h2>
                <p>Manage hospital supplies, medicines, and equipment efficiently.</p>
            </div>
        </div>
        
        <!-- Section for Supply Management -->
        <div class="row">
            <div class="col-md-12">
                <h3>Supplies Management</h3>
                <button class="btn btn-success" onclick="showAddSupplyModal()">Add New Supply</button>
                <button class="btn btn-primary" onclick="showSupplyList()">View Supplies</button>
            </div>
        </div>
                

        <!-- Section for Update and Delete Buttons -->
        <div class="row my-3">
            <div class="col-md-12">
                <button class="btn btn-info" onclick="showUpdateItems()">Update Items</button>
                <button class="btn btn-danger" onclick="showDeleteItems()">Delete Items</button>
            </div>
        </div>


        <!-- Section for Stock Alerts -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Stock Alerts</h3>
                <button class="btn btn-warning" onclick="showLowStock()">Low Stock Items</button>
            </div>
        </div>

    </div>

    <!-- Add Supply Modal -->
    <div class="modal fade" id="addSupplyModal" tabindex="-1" aria-labelledby="addSupplyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplyLabel">Add New Supply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="supplies.php" method="post">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Supplier ID:</label>
                            <input type="number" class="form-control" id="supply_id" name="supply_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="supplyName" class="form-label">Supply Name</label>
                            <input type="text" class="form-control" id="supply_name" name="supply_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label" >Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="medicine">Medicine</option>
                                <option value="equipment">Medical Equipment</option>
                                <option value="consumable">Consumable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Supplier Name:</label>
                            <input type="number" class="form-control" id="supplier_name" name="supplier_name" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showAddSupplyModal() {
            var addSupplyModal = new bootstrap.Modal(document.getElementById('addSupplyModal'));
            addSupplyModal.show();
        }

        function showSupplyList() {
            
            window.location.href = 'view_suppliers.php';
        }

        function showLowStock() {
            window.location.href = 'low_stock.php';
        }
        function showUpdateItems() {
            window.location.href = 'update.php';
        }

        function showDeleteItems() {
            window.location.href = 'delete.php';
        }

    </script>

</body>
</html>
