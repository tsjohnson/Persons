<?php
include_once 'style.php'
?>

<div class="container">
<table class='table table-bordered table-dark table-striped'>
  <form method = 'post' action='register.php'>
    <tr><td>Role: </tr></td><tr><td><select name="role">
      <option value="User">User</option>
      <option value="Admin">Admin</option>
    </select>
    <tr><td>First Name: </tr></td><tr><td><input type="text" name="fname"></tr></td></br>
    <tr><td>Last Name: </tr></td><tr><td><input type="text" name="lname"></tr></td></br>
    <tr><td>Email: </tr></td><tr><td><input type="text" name="email"></tr></td></br>
    <tr><td>Phone: </tr></td><tr><td><input type="text" name="phone"></tr></td></br>
    <tr><td>Password: </tr></td><tr><td><input type="password" name="password_hash"></tr></td></br>
    <tr><td>Repeat Password: </tr></td><tr><td><input type="password"></tr></td></br>
    <tr><td>Address: </tr></td><tr><td><input type="text" name="address"></tr></td></br>
    <tr><td>Address 2: </tr></td><tr><td><input type="text" name="address2"></tr></td></br>
    <tr><td>City: </tr></td><tr><td><input type="text" name="city"></tr></td></br>
    <tr><td>State: </tr></td><tr><td><input type="text" name="state"></tr></td></br>
    <tr><td>Zip Code: </tr></td><tr><td><input type="text" name="zip"></tr></td></br>
    <tr><td><input type = 'submit' value = "Register" name = 'login'></tr></td>
  </form>
</table>
</div>
</html>
