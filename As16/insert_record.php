<?php

require 'database/database.php';
$pdo = Database::connect();

$role = htmlspecialchars($_POST['role']);
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

$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code) VALUES ('$role', '$fname','$lname', '$email','$phone','$password','$salt','$address','$address2','$city','$state','$zip')";
$pdo->query($sql);
echo "<p>Successfully Added!</p></br>";
echo "<a href='display_list.php'>Return to list</a>";
    ;
 ?>
