<?php
session_start();
print_r($_SESSION);
echo "<div class = 'container-fluid'>";
//foreach to loop through the rows
  echo "<table class='table table-bordered table-dark table-striped'>
          <thead style='background-color:2C2C2C;'>
            <br><br><br>
            <tr><td>ID</td><td>Role</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Phone</td><td>Password</td><td>Address</td><td>Address 2</td><td>City</td><td>State</td><td>Zip Code</td><td>Actions</td></tr>
          </thead>
          <tbody>";
          foreach($data as $data){
            extract($data);
            $password = substr(md5($password_hash), 0, 5) . substr($password_salt, 0, 5) ;
            echo "<tr>
            <td>{$id}</td>
            <td>{$role}</td>
            <td>{$fname}</td>
            <td>{$lname}</td>
            <td>{$email}</td>
            <td>{$phone}</td>
            <td>{$password}</td>
            <td>{$address}</td>
            <td>{$address2}</td>
            <td>{$city}</td>
            <td>{$state}</td>
            <td>{$zip_code}</td>
            <td>
            ";
            if ($_SESSION['role']=='Admin'){
            echo "<form method = 'post' action = 'change_form.php'>
                <Input hidden type = 'text' name = 'id' value = '{$id}'>
                <div class='container-fluid btn-group'>
                <a href = 'update.php'><Input type = 'submit' name = 'change' class='btn btn-success' value = 'Update'><a>
                <a href = 'delete_form.php'><Input type = 'submit' name = 'change' class='btn btn-danger' value = 'Delete'><a>
                </div>
            </form>";

          }else if ($_SESSION['id']==$id){
          echo "<form method = 'post' action = 'change_form.php'>
              <Input hidden type = 'text' name = 'id' value = '{$id}'>
              <div class='container-fluid btn-group'>
              <a href = 'update.php'><Input type = 'submit' name = 'change' class='btn btn-success' value = 'Update'><a>
              </div>
          </form>";
        }
            echo "</td>

            </tr>";
          }
    echo "</tbody>
          <tfoot>";
          if ($_SESSION['role']=='Admin'){
          echo "<tr>
            <form method = 'post' action = 'create_character.php'>
              <td><input hidden class='form-control' name = 'id' type = 'text'></td>
              <td><select class='form-control' name='role'>
                <option value='User'>User</option>
                <option value='Admin'>Admin</option></td>
              </select>
              <td><input class='form-control' name = 'fname' type = 'text'></td>
              <td><input class='form-control' name = 'lname' type = 'text'></td>
              <td><input class='form-control' name = 'email' type = 'text'></td>
              <td><input class='form-control' name = 'phone' type = 'text'></td>
              <td><input class='form-control' name = 'password' type = 'password'></td>
              <td><input class='form-control' name = 'address' type = 'text'></td>
              <td><input class='form-control' name = 'address2' type = 'text'></td>
              <td><input class='form-control' name = 'city' type = 'text'></td>
              <td><input class='form-control' name = 'state' type = 'text'></td>
              <td><input class='form-control' name = 'zip_code' type = 'text'></td>
              <td><Button type = 'submit' class='btn btn-primary'>Create New Row</Button></td>
            </form>
          </tr>";}
          echo "
          </tfoot>
        </table>
</div>";
echo "</body>";
?>
