<?php

//This is pretty much an html document. This command brings in all those styles.
include_once 'style.php';

//Used to see if the page is updating and check the post array
print_r($_POST);
echo "The time is " . date("h:i:sa")
. "<br><br>";


include_once 'Objects/database.php';
include_once 'Objects/person.php';
$database = new Database();
$db = $database->getConnection();
$person = new Person($db);
$data = $person->readAll();
$data = $data->fetchAll(PDO::FETCH_ASSOC);

//Our character objects adds our character to the database based on its attributes
$person->role = htmlspecialchars($_POST['role']);
$person->fname = htmlspecialchars($_POST['fname']);
$person->lname = htmlspecialchars($_POST['lname']);
$person->email = htmlspecialchars($_POST['email']);
$person->phone = htmlspecialchars($_POST['phone']);
$person->password = htmlspecialchars($_POST['password_hash']);
$person->address = htmlspecialchars($_POST['address']);
$person->address2 = htmlspecialchars($_POST['address2']);
$person->city= htmlspecialchars($_POST['city']);
$person->state= htmlspecialchars($_POST['state']);
$person->zip_code= htmlspecialchars($_POST['zip']);

$person->create();
header('Location:index.php');



$role = htmlspecialchars($_POST['role']);
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$password = htmlspecialchars($_POST['password_hash']);
$address = htmlspecialchars($_POST['address']);
$address2 = htmlspecialchars($_POST['address2']);
$city= htmlspecialchars($_POST['city']);
$state= htmlspecialchars($_POST['state']);
$zip= htmlspecialchars($_POST['zip']);

$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, address, address2, city, state, zip_code) VALUES ('$role', '$fname','$lname', '$email','$phone','$password','$address','$address2','$city','$state','$zip')";
$pdo->query($sql);
echo "<p>Successfully Registered!</p></br>";
echo "<a href='index.html'>Return to Login</a>";
    ;
 ?>
