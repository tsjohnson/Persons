<?php
print_r($_POST);

    // include database and object file
    include_once 'Objects/database.php';
    include_once 'Objects/person.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $person = new Person($db);

    // set product id to be deleted
    print_r($_POST);
    $person->id = $_POST['id'];

    // delete the product
    if ($_POST['change'] == 'Delete'){
      $data = $person->readOne();
      $data = $data->fetchAll(PDO::FETCH_ASSOC);
      include_once 'style.php';
      include_once 'deleteLayout.php';
    }
    if ($_POST['change'] == 'Update'){
      $data = $person->readOne();
      $data = $data->fetchAll(PDO::FETCH_ASSOC);
      include_once 'style.php';
      include_once 'updateLayout.php';
    }

?>
