<?php
if (isset($_GET['msgu']) && $_GET['msgu'] == 'updated') {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ✅ Modification effectuée avec succès !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
}
if (isset($_GET['msg']) && $_GET['msg'] == "ok") {
    echo "<script>alert('Order deleted successfully');</script>";
} elseif (isset($_GET['msg']) && $_GET['msg'] == "okuser") {
    echo "<script>alert('User Deleted successfully');</script>";
}
session_start();

require_once 'db.php';
$requete = $pdo->prepare("SELECT * FROM compte");
$requete->execute();
$users = $requete->fetchAll();
$requeteorders = $pdo->prepare("SELECT * FROM orders");
$requeteorders->execute();
$orders = $requeteorders->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perfume Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 250px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-bag me-2"></i>
                <span class="fs-4">Perfume Shop</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" onclick="showSection('users')">
                        <i class="bi bi-house-door me-2"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" onclick="showSection('orders')">
                        <i class="bi bi-basket me-2"></i> Orders
                    </a>
                </li>
            </ul>
            <hr>
            <?php
            if (isset($_SESSION['admin'])) {
                echo '<a href="logout.php" class="btn btn-danger">Log out</a>';
            }
            ?>
        </div>

        <div class="container-fluid p-4">
            <!-- Users Section -->
            <div id="users" class="content-section" style="display:none;">
                <h3>Welcome to the Users Dashboard! <i class="bi bi-house-door"></i></h3>
                <h2>Users: </h2>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Date_Inscription</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) {  ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['Nom']; ?></td>
                                <td><?php echo $user['Email']; ?></td>
                                <td><?php echo $user['Modepass']; ?></td>
                                <td><?php echo $user['DateCreation']; ?></td>
                                <td>
                                    <a href="EditUser.php?id=<?php echo $user['id']; ?>" class="text-success me-2 btn">
                                        <i class="bi bi-pencil-square"></i> 
                                    </a>
                                    <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="text-danger me-2">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Orders Section -->
            <div id="orders" class="content-section" style="display:none;">
                <h2>Orders</h2>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Perfume Name</th>
                        <th>Order Date</th>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) {  ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['fullName']; ?></td>
                                <td><?php echo $order['email']; ?></td>
                                <td><?php echo $order['phone']; ?></td>
                                <td><?php echo $order['location']; ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo $order['perfumeName']; ?></td>
                                <td><?php echo $order['orderDate']; ?></td>
                                <td>
                                    <a href="ModifierOrder.php?id=<?php echo $order['id']; ?>" class="text-success me-2 btn">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="deleteOrder.php?id=<?php echo $order['id']; ?>" class="text-danger me-2 btn">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections first
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });
            // Show the section passed as parameter
            document.getElementById(sectionId).style.display = 'block';
        }
        showSection('users');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>