<?php 
if (isset($_GET['msg']) && $_GET['msg'] == "suc") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Votre compte a bien été créé !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
} elseif (isset($_GET['msg']) && $_GET['msg'] == "fail") {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Veuillez créer un compte !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        require_once 'db.php';

        $requette = $pdo->prepare("SELECT * FROM `compte` WHERE `Email`=?");
        $requette->execute([$email]);
        $user = $requette->fetch();

        if($user && $user['Email']== $email && $user['Modepass']== $password){
            session_start();
            $_SESSION['id']= $user['id'];
            $_SESSION['user'] = $user['Nom'];
            $_SESSION['email'] = $email;
            $_SESSION['password']= $password;
            header('location:index.php');
            if($user &&  $user['Email']== "admin2@gmail.com" && $user['Modepass']== "admin0000" || $user['Email']== "root@gmail.com" && $user['Modepass']== "root"){
              $_SESSION['admin']= true;
              header('Location:admin.php');
            }
        }
        } else {
            echo 'Identifiant ou mot de passe incorrect !';
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center mb-4">Login</h3>
        <form action="conexion.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100" name="submit">Se connecter</button>
          <div class="col-md-4"></div>
          <div class="col-md-4"><a href="creer.php">Créer un compte ?</a></div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
