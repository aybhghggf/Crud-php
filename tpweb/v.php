<?php
if(isset($_GET['msg'])&& $_GET['msg']=="suc"){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Commande has been sent successfully purschase will be done soon.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
session_start();
// session id user email password
if (isset($_SESSION['user']) && isset($_SESSION['password']) && isset($_SESSION['email']) && isset($_SESSION['id'])) {
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $id = $_SESSION['id'];
} else {
    $user = '';
    $email = '';
    $password = '';
    $id = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&family=Lilita+One&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Playpen+Sans:wght@100..800&family=Playwrite+AU+SA:wght@100..400&family=Playwrite+BE+WAL+Guides&family=Playwrite+DE+VA+Guides&family=Playwrite+VN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&family=Tenali+Ramakrishna&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
</head>

<body>
    <nav>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <h4>Ecom</h4>
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2">Product</a></li>
                    <li><a href="#" class="nav-link px-2">Contact</a></li>
                    <li><a href="#" class="nav-link px-2">About</a></li>
                </ul>
                    
                <div class="col-md-3 text-end">
                    <?php if ($user && $email) {
                        echo '<a href="logout.php" class="btn btn-danger me-2">Logout</a> ';
                    } else {
                        echo '<a href="conexion.php" class="btn btn-outline-primary me-2">Login </a>
                            <a href="creer.php" class="btn btn-primary">Sign-up</a>';
                    }
                    ?>
                </div>
            </header>
        </div>
    </nav>
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center mb-4">Confirm Your Order - versace Eros Edp</h3>
        
        <!-- Order details -->
        <div class="card mb-4">
          <img src="./images/versace.jpg" class="card-img-top" alt="Sauvage EDP Perfume">
          <div class="card-body">
            <h5 class="card-title"> Versace Eros Edp</h5>
            <p class="card-text">A fresh and powerful fragrance with notes of bergamot, pepper, and ambroxan.</p>
            <p><strong>Price: $120</strong></p>
          </div>
        </div>

        <!-- Order Form -->
        <form action="process_orderV.php" method="POST">
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Delivery Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Confirm Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
 </body>