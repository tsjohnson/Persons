<?php
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


<form method = 'post' action='update_record.php'>
  Enter the Id of the Row you want to Update: <input type="text" name="update"></br>
  <input type = 'submit' value = "Update" name = 'login'>
</form>

</html>
