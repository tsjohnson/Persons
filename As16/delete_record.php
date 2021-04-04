<?php
session_start();
require 'database/database.php';
$pdo = Database::connect();

$delt = htmlspecialchars($_SESSION['delete']);
echo $delt;

$sql = "DELETE FROM persons WHERE id=$delt";
  $pdo->query($sql);
echo "<p>Successfully Deleted!</p></br>";
echo "<a href='display_list.php'>Return to list</a>";
    ;
 ?>
