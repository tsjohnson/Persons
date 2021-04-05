<?php


    // include database and object file
    include_once 'Objects/database.php';
    include_once 'Objects/person.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $person= new Person($db);
    $data = $person->readOne();
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    $person->role = $_POST['role'];
    $person->fname = $_POST['fname'];
    $person->lname = $_POST['lname'];
    $person->email = $_POST['email'];
    $person->phone = $_POST['phone'];
    $person->password_hash = $_POST['password'];
    $person->password_salt = md5(microtime());
    $person->address = $_POST['address'];
    $person->address2 = $_POST['address2'];
    $person->city = $_POST['city'];
    $person->state = $_POST['state'];
    $person->zip_code = $_POST['zip_code'];
    $person->id = $_POST['id'];
    $person->update();
    header('Location:display.php');

?>
