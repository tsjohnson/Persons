<?php
session_start();
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

            </td></tr>";
          }
    echo "</tbody>
          <tfoot>
          <tr>
            <form method = 'post' action = 'update.php'>
            <td><input hidden class='form-control' name = 'id' type = 'text' value= {$id}></td>";
            if ($_SESSION['role'] =='Admin'){
              echo "<td><select class='form-control' name='role'>
              <option value='User'>User</option>
              <option value='Admin'>Admin</option></td>";
            }else{
              echo "<td><select hidden class='form-control' name='role'>
              <option selected value='User'>User</option>
              <option value='Admin'>Admin</option></td>";
            }
            echo "
            </select>
            <td><input class='form-control' name = 'fname' type = 'text' value= {$fname}></td>
            <td><input class='form-control' name = 'lname' type = 'text' value= {$lname}></td>
            <td><input class='form-control' name = 'email' type = 'text' value= {$email}></td>
            <td><input class='form-control' name = 'phone' type = 'text' value= {$phone}></td>
            <td><input class='form-control' name = 'password' type = 'password' value= {$password_hash}></td>
            <td><input class='form-control' name = 'address' type = 'text' value= {$address}></td>
            <td><input class='form-control' name = 'address2' type = 'text' value= {$address2}></td>
            <td><input class='form-control' name = 'city' type = 'text' value= {$city}></td>
            <td><input class='form-control' name = 'state' type = 'text' value= {$state}></td>
            <td><input class='form-control' name = 'zip_code' type = 'text' value= {$zip_code}></td>
              <td><Button type = 'submit' class='btn btn-success'>Update</Button></td>
            </form>
          </tr>
          </tfoot>
        </table>
</div>";
echo "</body>";
?>
