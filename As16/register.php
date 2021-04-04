<?php

$fnameError = "";
if (empty($_POST['fname'])){
  $fnameError = "Required";
  header("Location: registerForm.php?" . "fnameError = $fnameError");
}




require 'database/database.php';
$pdo = Database::connect();
$role = htmlspecialchars($_POST['role']);
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$password = htmlspecialchars($_POST['password_hash']);
if (length($password) < 16)
$address = htmlspecialchars($_POST['address']);
$address2 = htmlspecialchars($_POST['address2']);
$city= htmlspecialchars($_POST['city']);
$state= htmlspecialchars($_POST['state']);
$zip= htmlspecialchars($_POST['zip']);

$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, address, address2, city, state, zip_code) VALUES ('$role', '$fname','$lname', '$email','$phone','$password','$address','$address2','$city','$state','$zip')";
$pdo->query($sql);
echo "<p>Successfully Registered!</p></br>";
echo "<a href='login.html'>Return to Login</a>";
    ;
 ?>
