<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once'db.php';
    $requete= $pdo->prepare("DELETE FROM `orders` WHERE id=?");
    $requete->execute([$id]);
    header('location:admin.php?msg=ok');
    exit();
}
?>