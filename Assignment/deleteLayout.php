<?php
echo "<div class = 'container'>";
//foreach to loop through the rows
  echo "<table class='table table-bordered table-dark table-striped'>";
          foreach($data as $data){
            extract($data);
            echo "<tr><td>Are you sure you want to delete {$fname} {$lname}</td>
            <td>
            <form method = 'post' action = 'delete.php'>
                <Input hidden type = 'text' name = 'id' value = '{$id}'>
                <a href = 'delete.php'><Input type = 'submit' name = 'change' class='btn btn-success' value = 'Confirm'><a>
                <a href = 'index.php'><Input type = 'submit' name = 'change' class='btn btn-danger' value = 'Cancel'><a>
            </form>
            </td>
            </tr>";
          }
    echo "
        </table>
</div>";
echo "</body>";
?>
