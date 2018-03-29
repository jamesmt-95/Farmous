<?php

class Database extends PDO {

    public function __construct() {
        $DB_TYPE = 'mysql';
        $DB_HOST = 'localhost';
        $DB_NAME = 'farmous_db';
        $DB_USER = 'root';
        $DB_PASS = '';
        
        
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    }

}

/*
  $SERVER = "localhost";
  $DB="famous";
  $USER = "root";
  $PASS = "";


  try {
  $db = new PDO("mysql:$SERVER;dbname=$DB", $USER, $PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }
  catch(PDOException $e)
  {
  //echo '<script>alert("Failed");</script>';
  echo "Connection failed: " . $e->getMessage();
  //header("location:localhost:8090/error.php");
  exit();
  }

 */

/*
  class Database extends PDO {

  public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
  parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
  }


  public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
  $sth = $this->prepare($sql);
  foreach ($array as $key => $value) {
  $sth->bindValue("$key", $value);
  }
  $sth->execute();
  return $sth->fetchAll($fetchMode);
  }


  public function exec($qry) {
  $this->setAttribute(parent::ATTR_EMULATE_PREPARES, false);
  $sth = $this->prepare($qry);

  if (!$sth->execute()) {
  $qry = $sth->queryString;
  foreach ($data as $key => $value) {
  $qry = str_replace(":$key", "\'" . $value . "\'", $qry);
  }
  $this->queryErrorLog($qry, $this->errorInfo());
  }
  }
  }
 */
?>