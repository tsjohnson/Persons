<?php
class Database{

    // specify your own database credentials
    private static $dbHost = "localhost";
    private static $dbName = "projects";
    private static $dbUsername = "TheHost";
    private static $dbUserPassword = "pass";
    private static $cont = null;

    public function __construct(){
        exit('Init function is not allowed');
    }

    public static function connect() {
      if (null == self::$cont) {
          try {
              self::$cont = new PDO(
                "mysql:host=".self::$dbHost.";"
                . "dbname=".self::$dbName,
                self::$dbUsername,
                self::$dbUserPassword
              );
          }
          catch(PDOException $e){
            die($e->getMessage());
          }
      }
      return self::$cont;
    }

    public static function disconnect(){
      self::$cont = null;
    }
}
?>
