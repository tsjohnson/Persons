<?php
session_start();
require 'database/database.php';
$pdo = Database::connect();

$delt = htmlspecialchars($_POST['delete']);
$_SESSION['delete'] = $delt;
$sql = "SELECT * FROM persons WHERE id=$delt";
$query=$pdo->prepare($sql);
$query->execute();
while ($row_category = $query->fetch(PDO::FETCH_ASSOC)){
    extract($row_category);
    echo '<p>Are you sure you want to delete </p>' . "<p>$fname</p>" . " " . "<p>$lname</p>" . "<p> from this table?</p></br>";
    echo "<a href='display_list.php' ><Button>Cancel</Button></a>";
    echo "<a href='delete_record.php' name = 'delete' value = '$delt'><Button>Confirm</Button></a>";

}
?>
