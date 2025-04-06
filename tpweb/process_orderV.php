<?php 
if( isset($_POST['fullName']) && isset($_POST['email'])&&isset($_POST['phone'])&& isset($_POST['location'])&& isset($_POST['quantity']) ){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $quantity = $_POST['quantity'];
    $perfumeName= "Vercace Edp";
    require_once 'db.php';
    $requete= $pdo->prepare("INSERT INTO `orders`(`fullName`, `email`, `phone`, `location`, `quantity`, `perfumeName`) VALUES (?,?,?,?,?,?)");
    $requete->execute(array($fullName, $email, $phone, $location, $quantity, $perfumeName));
    header("Location:v.php?msg=suc"); 
    exit();

}
?>