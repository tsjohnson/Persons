<?php
session_start();
//This is pretty much an html document. This command brings in all those styles.
include_once 'style.php';

//Used to see if the page is updating and check the post array
print_r($_POST);
echo "The time is " . date("h:i:sa")
. "<br><br>";


include_once 'Objects/database.php';
include_once 'Objects/person.php';
$database = new Database();
$db = $database->getConnection();

if (!empty($_POST['email']) && !empty($_POST['password'])) {

  # prevent injection
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $query = "SELECT * FROM persons WHERE email='$email' AND password_hash='$password'"
      . " LIMIT 1"
      ;

  $stmt=$db->prepare($query);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  #if username/password_hash are valid set $_SESSION
  echo "hey";
  if ($result) {
    $_SESSION['email'] = $result['email'];
    $_SESSION['role'] = $result['role'];
    $_SESSION['id'] = $result['id'];
    header('Location: display.php');
    }
  else echo 'Login failure: wrong username or password';
  }

?>
