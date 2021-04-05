<?php
class Person{
  private $conn;
  private $table = 'persons';

  public $id;
  public $role;
  public $fname;
  public $lname;
  public $email;
  public $phone;
  public $password_hash;
  public $password_salt;
  public $address;
  public $address2;
  public $city;
  public $state;
  public $zip_code;
  //stores connection info into the private $conn variable
  public function __construct($db){
    $this->conn = $db;
  }
  function create(){
    //prep the query
    $query = "INSERT INTO " . $this->table .
    " SET
          role=:role,
          fname=:fname,
          lname=:lname,
          email=:email,
          phone=:phone,
          password_hash=:password_hash,
          password_salt=:password_salt,
          address=:address,
          address2=:address2,
          city=:city,
          state=:state,
          zip_code=:zip_code";
    $stmt = $this->conn->prepare($query);

    //Gets rid of possible sql injection
    $this->role=htmlspecialchars(strip_tags($this->role));
    $this->fname=htmlspecialchars(strip_tags($this->fname));
    $this->lname=htmlspecialchars(strip_tags($this->lname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->password_hash=htmlspecialchars(strip_tags($this->password_hash));
    $this->password_salt=htmlspecialchars(strip_tags($this->password_salt));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->address2=htmlspecialchars(strip_tags($this->address2));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->state=htmlspecialchars(strip_tags($this->state));
    $this->zip_code=htmlspecialchars(strip_tags($this->zip_code));


    //Goes into our prepared statement and swaps VALUES
    $stmt->bindParam(":role", $this->role);
    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":password_hash", $this->password_hash);
    $stmt->bindParam(":password_salt", $this->password_salt);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":address2", $this->address2);
    $stmt->bindParam(":city", $this->city);
    $stmt->bindParam(":state", $this->state);
    $stmt->bindParam(":zip_code", $this->zip_code);

    //Our function is going to return a boolean, but this also executes the query
    if($stmt->execute()){
      return true;
    }else{
      return false;
    }

  }


  function readAll(){
  $query = "SELECT id, role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code
            FROM " . $this->table;

  $stmt = $this->conn->prepare($query);
  $stmt->execute();

  return $stmt;
}

function readOne(){
$query = "SELECT id, role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code
          FROM " . $this->table . "
          WHERE id = ?
          LIMIT 0,1";
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->id);
          $stmt->execute();
return $stmt;
}

function delete(){
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    if($stmt->execute()){
      return true;
    }

    return false;
  }

  function update(){
      $query = "UPDATE " . $this->table.
      " SET role=:role,
            fname=:fname,
            lname=:lname,
            email=:email,
            phone=:phone,
            password_hash=:password_hash,
            password_salt=:password_salt,
            address=:address,
            address2=:address2,
            city=:city,
            state=:state,
            zip_code=:zip_code
            WHERE id=:id";
            echo $query;
       $stmt = $this->conn->prepare($query);
       // posted values
       //Gets rid of possible sql injection
       $this->id=htmlspecialchars(strip_tags($this->id));
       $this->role=htmlspecialchars(strip_tags($this->role));
       $this->fname=htmlspecialchars(strip_tags($this->fname));
       $this->lname=htmlspecialchars(strip_tags($this->lname));
       $this->email=htmlspecialchars(strip_tags($this->email));
       $this->phone=htmlspecialchars(strip_tags($this->phone));
       $this->password_hash=htmlspecialchars(strip_tags($this->password_hash));
       $this->password_salt=htmlspecialchars(strip_tags($this->password_salt));
       $this->address=htmlspecialchars(strip_tags($this->address));
       $this->address2=htmlspecialchars(strip_tags($this->address2));
       $this->city=htmlspecialchars(strip_tags($this->city));
       $this->state=htmlspecialchars(strip_tags($this->state));
       $this->zip_code=htmlspecialchars(strip_tags($this->zip_code));


       //Goes into our prepared statement and swaps VALUES
       $stmt->bindParam(':id', $this->id);
       $stmt->bindParam(":role", $this->role);
       $stmt->bindParam(":fname", $this->fname);
       $stmt->bindParam(":lname", $this->lname);
       $stmt->bindParam(":email", $this->email);
       $stmt->bindParam(":phone", $this->phone);
       $stmt->bindParam(":password_hash", $this->password_hash);
       $stmt->bindParam(":password_salt", $this->password_salt);
       $stmt->bindParam(":address", $this->address);
       $stmt->bindParam(":address2", $this->address2);
       $stmt->bindParam(":city", $this->city);
       $stmt->bindParam(":state", $this->state);
       $stmt->bindParam(":zip_code", $this->zip_code);

       if($stmt->execute()){
         return true;
       }
       return false;
     }

}


 ?>
