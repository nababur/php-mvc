<?php


/**
 * Database class
 */
class Database extends PDO{

  // Construct method
  public function __construct($dsn, $user, $pass){
    parent::__construct($dsn, $user, $pass);
  }




      // $sql  = "INSERT INTO tbl_user (name, email) VALUES(:name, :email)";
      // $stmt = $this->prepare($sql);
      // $sql  = bindValue(':name', $name);
      // $sql  = bindValue(':email', $email);
      // $stmt->execute();

    // Insert Query Method
    public function insert($tble, $data = array()){

      if (!empty($data) && is_array($data)) {
         $keys    = '';
         $values  = '';
         $i       = 0;

         $keys    = implode(",", array_keys($data));
         $values  = ":".implode(", :", array_keys($data));

         $sql     = "INSERT INTO ".$tble." ( ".$keys.") VALUES (".$values.")";
         $stmt = $this->prepare($sql);
         foreach ($data as $key => $value) {
           $stmt->bindValue(":$key", $value);
         }
         return $result = $stmt->execute();



      }

    }




  // $sql  = "SELECT tbl_user WHERE id=:id AND email=:email LIMIT 1";
  // $sql  = bindValue(':id', $id);
  // $sql  = "SELECT * FROM tbl_user";
  // $stmt = $this->prepare($sql);
  // $stmt->execute();
  // return $stmt->fetchAll();
  // Select Query Method
  public function select($tble, $data = array()){
    $sql = 'SELECT ';
    $sql .= array_key_exists("select", $data)? $data['select']:'*';
    $sql .= ' FROM '.$tble;

    if (array_key_exists("where", $data)) {
      $sql .= ' WHERE ';
      $i = 0;
      foreach ($data['where'] as $key => $value) {
        $add = ($i> 0)?' AND ': '';
        $sql .= "$add"."$key=:$key";
        $i++;
      }

    }


    if (array_key_exists("order_by", $data)) {
      $sql .= ' ORDER BY '.$data['order_by'];
    }


    if (array_key_exists("start", $data) && array_key_exists("end", $data)) {
      $sql .=' LIMIT '.$data['start'].','.$data['end'];
    }elseif (!array_key_exists("start", $data) && array_key_exists("end", $data)){
      $sql .=' LIMIT '.$data['end'];
    }

    $stmt = $this->prepare($sql);
    if (array_key_exists("where", $data)) {

      foreach ($data['where'] as $key => $value) {
        $stmt->bindValue(":$key", $value);
      }

    }

    $stmt->execute();

    if (array_key_exists("return_type", $data)) {
      switch ($data['return_type']) {
        case 'count':
          $value = $stmt->rowCount();
          break;

        case 'single':
          $value = $stmt->fetch(PDO::FETCH_ASSOC);
          break;

        default:
          $value = '';
          break;
      }
    }else{
      if ($stmt->rowCount() > 0) {
        $value = $stmt->fetchAll();
      }
    }

     return !empty($value)?$value:false;



  }



  // Update Query Method
  // $sql  = "UPDATE TABLENAME SET name=:name, email=:email, password=:password where id=:id";
  // $sql  = bindValue(':name', $name);
  // $sql  = bindValue(':email', $email);
  // $sql  = bindValue(':password', $password);
  // $stmt->execute();

  public function update($tble, $data, $wherecond){
    if (!empty($data) && is_array($data)) {
        $keyVal = '';
        $whereCond = '';
        $i = 0;

        foreach ($data as $key => $value) {
          $add = ($i >0 )? ' , ': '';
          $keyVal .= "$add"."$key=:$key";
          $i++;
        }

        if (!empty($wherecond) && is_array($wherecond)) {
          $whereCond .= " WHERE ";
          $i = 0;
          foreach ($wherecond as $key => $value) {
            $add = ($i >0 )? ' AND ': '';
            $whereCond .= "$add"."$key=:$key";
            $i++;
          }

        }

        $sql = "UPDATE ".$tble." SET ".$keyVal.$whereCond;
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
          $stmt->bindValue(":$key", $value);
        }
        foreach ($wherecond as $key => $value) {
          $stmt->bindValue(":$key", $value);
        }
        $update = $stmt->execute();

        return $update?$stmt->rowCount():false;



    }else {
      return false;
    }

  }



  // Delete Method
  /*
  $sql = $this->pdo->prepare("DELETE FROM tblname WHERE  email =:email");
  $sql = bindValue(':id', $id);
  $sql = execute();

  */
  public function delete($tble, $data){


    if (!empty($data) && is_array($data)) {
      $wherecond = '';

      $wherecond .=" WHERE ";
      $i = 0;

      foreach ($data as $key => $value) {
        $add = ($i > 0)? ' AND ': '';
        $wherecond .="$add"."$key=:$key";
        $i++;
      }
    }

    $sql = "DELETE FROM ".$tble.$wherecond;
    $stmt = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $stmt->bindValue(":$key", $value);
    }
    $delete = $stmt->execute();
    return $delete ? true:false;



  }

  // User access query select
  public function affectedRows($sql, $email, $password){
    $stmt = $this->prepare($sql);
    $stmt->execute(array($email, $password));
    return  $stmt->rowCount();
  }


  // Get User Data method
  public function selectUserData($sql, $email, $password){
    $stmt = $this->prepare($sql);
    $stmt->execute(array($email, $password));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }


}
