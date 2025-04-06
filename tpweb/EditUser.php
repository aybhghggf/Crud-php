<?php
require_once 'db.php';
session_start();

// Get user ID from URL
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID manquante.";
    exit;
}

// Get user from DB
$requete = $pdo->prepare("SELECT * FROM compte WHERE id = ?");
$requete->execute([$id]);
$user = $requete->fetch();

if (!$user) {
    echo "Utilisateur introuvable.";
    exit;
}
if (isset($_POST['submit'])) {
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $password = $_POST['Modepass'];
    $date = $_POST['DateCreation'];

    $update = $pdo->prepare("UPDATE compte SET Nom = ?, Email = ?, Modepass = ?, DateCreation = ? WHERE id = ?");
    $update->execute([$nom, $email, $password, $date, $id]);
    header("Location: admin.php?msgu=updated");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modifier Utilisateur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">Modifier Utilisateur</h2>

  <form method="POST" action="EditUser.php?id=<?= $id ?>">
    <div class="mb-3">
      <label for="Nom" class="form-label">Nom</label>
      <input type="text" name="Nom" class="form-control" value="<?= htmlspecialchars($user['Nom']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="Email" class="form-label">Email</label>
      <input type="email" name="Email" class="form-control" value="<?= htmlspecialchars($user['Email']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="Modepass" class="form-label">Mot de passe</label>
      <input type="text" name="Modepass" class="form-control" value="<?= htmlspecialchars($user['Modepass']) ?>" required>
    </div>

    <div class="mb-3">
      <label for="DateCreation" class="form-label">Date de mise à jour</label>
      <input type="date" name="DateCreation" class="form-control" value="<?= htmlspecialchars($user['DateCreation']) ?>" required>
    </div>

    <button type="submit" name="submit" class="btn btn-success">Mettre à jour</button>
    <a href="admin.php" class="btn btn-secondary">Annuler</a>
  </form>
</div>

</body>
</html>
