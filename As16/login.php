<?php
session_start();
if (!empty($_POST['email']) && !empty($_POST['password_hash'])) {

  #check database for valid username/password_hash
  require 'database/database.php';
  $pdo = Database::connect();

  # prevent injection
  $_POST['email'] = htmlspecialchars($_POST['email']);
  $_POST['password_hash'] = htmlspecialchars($_POST['password_hash']);

  $sql = "SELECT * FROM persons "
      . " WHERE email='" . $_POST['email'] . "' "
      . " AND password_hash='" . $_POST['password_hash'] . "' "
      . " LIMIT 1"
      ;

  $query=$pdo->prepare($sql);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  #if username/password_hash are valid set $_SESSION
  if ($result) {
    $_SESSION['email'] = $result['email'];
    $_SESSION['role'] = $result['role'];
    $_SESSION['id'] = $result['id'];
    header('Location: display_list.php');
    }
  else echo 'Login failure: wrong username or password';
  }

?>
