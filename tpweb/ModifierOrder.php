<?php
require_once 'db.php';
session_start();

if (!isset($_GET['id'])) {
    echo "Commande non trouvée.";
    exit;
}

$id = $_GET['id'];
$requete = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
$requete->execute([$id]);
$order = $requete->fetch();

if (!$order) {
    echo "Commande non trouvée.";
    exit;
}

if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $quantity = $_POST['quantity'];
    $perfumeName = $_POST['perfumeName'];
    $orderDate = $_POST['orderDate'];

    $update = $pdo->prepare("UPDATE orders SET fullName = ?, email = ?, phone = ?, location = ?, quantity = ?, perfumeName = ?, orderDate = ? WHERE id = ?");
    $update->execute([$fullName, $email, $phone, $location, $quantity, $perfumeName, $orderDate, $id]);

    header("Location:admin.php?msgo=order_updated");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modifier Commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2>Modifier Commande</h2>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nom Complet</label>
      <input type="text" name="fullName" class="form-control" value="<?= htmlspecialchars($order['fullName']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($order['email']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Téléphone</label>
      <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($order['phone']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Adresse</label>
      <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($order['location']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Quantité</label>
      <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($order['quantity']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nom de Parfum</label>
      <input type="text" name="perfumeName" class="form-control" value="<?= htmlspecialchars($order['perfumeName']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Date de Commande</label>
      <input type="date" name="orderDate" class="form-control" value="<?= htmlspecialchars($order['orderDate']) ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="admin.php" class="btn btn-secondary">Annuler</a>
  </form>
</div>

</body>
</html>
