<?php
class Database {
  private $host = 'localhost';
  private $db_name = 'projects';
  private $username = 'tim';
  public $conn;
  public function getConnection(){
    $this->conn = null;

    try{
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username);
    } catch(PDOException $exception){
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
}
 ?>
