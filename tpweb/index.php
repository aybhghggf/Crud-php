<?php
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
                    <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
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
    <!--********************************************************************************************************-->



    <section>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="./images/212Men.webp" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="400" height="500" loading="lazy" style="border-radius: 10px;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">The Fragrance Boutique</h1>
                    <p class="lead">At The Fragrance Boutique, we offer an exclusive collection of the finest perfumes. Whether you're looking for a signature scent or a gift for someone special, our curated selection of luxurious fragrances will captivate your senses and leave a lasting impression. Discover your perfect scent today and elevate your fragrance experience.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="sec2">
        <h1>Our Fragrences :</h1>
        <div class="carousel-container mt-5">
            <div id="perfumeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/sauvage.webp" class="d-block h-300 w-100" alt="Perfume 1">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/versace.jpg" class="d-block w-100" alt="Perfume 2">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/212Men.webp" class="d-block w-100" alt="Perfume 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="sec-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/sauvage.webp" class="card-img-top" alt="Perfume 1">
                        <div class="card-body">
                            <h5 class="card-title">Sauvage Edp</h5>
                            <p class="card-text"> A fresh and woody fragrance for men. </p> <br>
                            <a href="s.php" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/versace.jpg" class="card-img-top" alt="Perfume 2">
                        <div class="card-body">
                            <h5 class="card-title">Versace Eau De Parfum</h5>
                            <p class="card-text">An exotic scent with a hint of floral notes, perfect for evening wear.</p>
                            <a href="v.php" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="./images/212Men.webp" class="card-img-top" alt="Perfume 3">
                        <div class="card-body">
                            <h5 class="card-title">212 Vip Men</h5>
                            <p class="card-text">A rich fragrance with a mix of woody and musky tones, ideal for all seasons.</p>
                            <a href="2.php" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white py-4 mt-5">
  <div class="container">
    <div class="row">
      <!-- Company Info -->
      <div class="col-md-4 mb-3">
        <h5>Perfume Shop</h5>
        <p>Nous vous offrons les meilleurs parfums de qualité avec livraison rapide.</p>
      </div>
      
      <!-- Quick Links -->
      <div class="col-md-4 mb-3">
        <h5>Liens Utiles</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
          <li><a href="#" class="text-white text-decoration-none">Produits</a></li>
          <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
        </ul>
      </div>
      
      <!-- Contact Info -->
      <div class="col-md-4 mb-3">
        <h5>Contact</h5>
        <p><i class="bi bi-envelope"></i> contact@perfume.ma</p>
        <p><i class="bi bi-phone"></i> +212 6 00 00 00 00</p>
        <p><i class="bi bi-geo-alt"></i> Casablanca, Maroc</p>
      </div>
    </div>

    <hr class="border-light" />
    
    <!-- Copyright -->
    <div class="text-center">
      &copy; <?= date('Y') ?> Perfume Shop. Tous droits réservés.
    </div>
  </div>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</html>