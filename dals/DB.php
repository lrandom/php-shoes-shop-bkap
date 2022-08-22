<?php 
 class DB{
    protected $pdo = null;
    protected $tableName = null;

    public function setTableName($tableName){
      $this->tableName = $tableName;
    }

    public function __construct()
    {
      try {
        $this->pdo = new PDO("mysql:host=localhost;dbname=shoes_shop","root","");
        //cau lenh nay set kha nang nem loi cua PDO 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      } catch (\Throwable $th) {
         //throw $th;
      } 
    }
 }
?>