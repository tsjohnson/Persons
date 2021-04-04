<?php
session_start();
print_r($_SESSION);
require 'database/database.php';
$pdo = Database::connect();

$sql = "SELECT * FROM persons ";
$query=$pdo->prepare($sql);
$query->execute();


 ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href= "style.css">

<table method = 'post'>
  <tbody>
    <tr id = 'Categories' ><td>ID</td><td>Role</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Phone Number</td><td>Password</td><td>Address</td><td>Address 2</td><td>City</td><td>State</td><td>Zip</td></tr>
    <?php
    while ($row_category = $query->fetch(PDO::FETCH_ASSOC)){
        extract($row_category);
        $password = MD5("$password_hash") . "$password_salt";
        echo "<tr><td>{$id}</td><td>{$role}</td><td>{$fname}</td><td>{$lname}</td><td>{$email}</td><td>{$phone}</td><td>$password</td><td>{$address}</td><td>{$address2}</td><td>{$city}</td><td>{$state}</td><td>{$zip_code}</td></tr>";
      }
     ?>
</table>

<?php
  if ($_SESSION['role'] == "Admin"){
    ?>
    <a href = "create_form.php"><Button>Create New</Button></a><br>
    <a href = "update_form.php"><Button> Update Row By ID</Button></a><br>
    <a href = "delete.php"><Button> Delete Row by ID</Button></a>
    <?php
  }
  else{
    ?>
    <a href = "update_record.php"><Button> Update Yourself</Button></a><br>
    <?php
  }
?>
