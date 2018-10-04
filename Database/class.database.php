<?php
class DB {
    private $pdo;

    public function __construct ($dsn, $uname, $pwd){
        try{
            $pdo = new PDO($dsn, $uname, $pwd);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function execQuery($sql){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}
?>