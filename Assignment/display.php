<?php

//This is pretty much an html document. This command brings in all those styles.
include_once 'style.php';

//Used to see if the page is updating and check the post array
print_r($_POST);
echo "The time is " . date("h:i:sa")
. "<br><br>";



//getConnection() pretty much returns something like this line
//$pdo = new PDO("mysql:host=$server;dbname=$dbname", $username);
include_once 'Objects/database.php';
include_once 'Objects/person.php';
$database = new Database();
$db = $database->getConnection();

$char = new Person($db);
$data = $char->readAll();
$data = $data->fetchAll(PDO::FETCH_ASSOC);

//Draws the table
include_once 'layout.php';


 ?>
