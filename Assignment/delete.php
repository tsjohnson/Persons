<?php


    // include database and object file
    include_once 'Objects/database.php';
    include_once 'Objects/person.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $person = new Person($db);
    $data = $person->readOne();
    $data = $data->fetchAll(PDO::FETCH_ASSOC);

    if ($_POST['change'] == 'Confirm'){
    $person->id = $_POST['id'];
    $person->delete();
    header('Location:display.php');
    }

    if ($_POST['change'] == 'Cancel'){
    header('Location:display.php');
    }
?>
