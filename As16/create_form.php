<!DOCTYPE html>
<html lang = "en-US">
<form method = 'post' action='insert_record.php'>

  <select name="role">
    <option value="User">User</option>
    <option value="Admin">Admin</option>
  </select>

  First Name: <input type="text" name="fname"></br>
  Last Name: <input type="text" name="lname"></br>
  Email: <input type="text" name="email"></br>
  Phone: <input type="text" name="phone"></br>
  Password: <input type='password' name="password_hash"></br>
  Address: <input type="text" name="address"></br>
  Address 2: <input type="text" name="address2"></br>
  City: <input type="text" name="city"></br>
  State: <input type="text" name="state"></br>
  Zip Code: <input type="text" name="zip"></br>

  <input type = 'submit' value = "Create" name = 'login'>
</form>

</html>
