<?php
session_start();
require 'database/database.php';
$pdo = Database::connect();
if ($_SESSION['role']=='User'){
  $_POST['update'] = $_SESSION['id'];
}
$upd = htmlspecialchars($_POST['update']);
echo $upd;

$sql = "SELECT * FROM persons WHERE id=$upd";
$query=$pdo->prepare($sql);
$query->execute();

 ?>
 <!DOCTYPE html>
 <head>
 <link rel="stylesheet" href= "style.css">
 <table method = 'post'>
   <tbody>
     <?php
     while ($row_category = $query->fetch(PDO::FETCH_ASSOC)){
         extract($row_category);
         echo "<form method = 'post' action='update.php'>";
         if ($_SESSION['role']=='Admin'){
         echo "<select name='role'>
           <option value='User'>User</option>
           <option selected value='Admin'>Admin</option>
         </select>";
         }
         if ($_SESSION['role']=='Admin'){
           echo "ID: <input type='text' name='update' value='$upd'></br>";
         }else{
         echo "ID: <input type='text' name='update' value='$upd' disabled></br>";
         }
         echo "First Name: <input type='text' name='fname' value='{$fname}'></br>";
         echo "Last Name: <input type='text' name='lname' value='{$lname}'></br>";
         echo "Email: <input type='text' name='email' value='{$email}'></br>";
         echo "Phone: <input type='text' name='phone' value='{$phone}'></br>";
         echo "Password: <input type='password' name='password_hash' value='{$password_hash}'></br>";
         echo "Address: <input type='text' name='address' value='{$address}'></br>";
         echo "Address 2: <input type='text' name='address2' value='{$address2}'></br>";
         echo "City: <input type='text' name='city' value='{$city}'></br>";
         echo "State: <input type='text' name='state' value='{$state}'></br>";
         echo "Zip Code: <input type='text' name='zip' value='{$zip_code}'></br> ";
         echo "<input type = 'submit' value = 'Update' name = 'login'>";
         echo "</form>";
       }
      ?>
 </table>
