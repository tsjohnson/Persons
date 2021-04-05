<?php
include_once 'style.php'
?>

<div class="container">
<table class='table table-bordered table-dark table-striped'>
  <form method = 'post' action='login.php'>
    <tr><td><label for='email'>Name</label></tr></td>
    <tr><td><input type="text" id = 'email' name='email'></tr></td></br>
    <tr><td><label for='password'>Password</label></tr></td>
    <tr><td><input type='password' id = 'password' name='password'></tr></td></br>
    <tr><td><input type = 'submit' value = "Submit" class = 'btn btn-primary' name = 'login'></tr></td></br>
  </form>
  <tr><td>Don't have an account? Click here to register! <a href = "reg.php"><Button class = 'btn btn-info'> Register</Button></a><br></tr></td>
  <tr><td>Access the Github here -> <a href = "https://github.com/tsjohnson/Persons"><Button class = 'btn btn-success'> Github</Button></a><br></tr></td>
</table>
</div>
</html>
