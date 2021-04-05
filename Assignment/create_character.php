<?php
include_once 'style.php';
include_once 'Objects/database.php';
include_once 'Objects/person.php';

//create character and give our character the database info
$database = new Database();
$db = $database->getConnection();
$Person = new Person($db);

//Our character objects adds our character to the database based on its attributes
$Person->role = $_POST['role'];
$Person->fname = $_POST['fname'];
$Person->lname = $_POST['lname'];
$Person->email = $_POST['email'];
$Person->phone = $_POST['phone'];
$Person->password_hash = $_POST['password'];
$Person->password_salt = md5(microtime());
$Person->address = $_POST['address'];
$Person->address2 = $_POST['address2'];
$Person->city = $_POST['city'];
$Person->state = $_POST['state'];
$Person->zip_code = $_POST['zip_code'];

$Person->create();
header('Location:display.php');

 ?>
