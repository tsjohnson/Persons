<?php
session_start();
require 'database/database.php';
$pdo = Database::connect();

if ($_SESSION['role']=='User'){
  $upd =  $_SESSION['id'];
  $role = $_SESSION['role'];
}else{
  $upd = htmlspecialchars($_POST['update']);
  $role = htmlspecialchars($_POST['role']);
}

$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$password = htmlspecialchars($_POST['password_hash']);
$salt = MD5(microtime(true));
$address = htmlspecialchars($_POST['address']);
$address2 = htmlspecialchars($_POST['address2']);
$city= htmlspecialchars($_POST['city']);
$state= htmlspecialchars($_POST['state']);
$zip= htmlspecialchars($_POST['zip']);


$sql = "UPDATE persons SET role = '$role', fname = '$fname', lname = '$lname' , email = '$email', phone = '$phone', password_hash = '$password', password_salt = '$salt', address = '$address', address2 = '$address2', city = '$city', state = '$state', zip_code = '$zip' WHERE id = $upd;";
$pdo->query($sql);
echo "<p>Successfully Updated!</p></br>";
echo "<a href='display_list.php'>Return to list</a>";
    ;
 ?>
