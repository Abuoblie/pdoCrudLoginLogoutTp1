<?php                                //$dsn                //$user(root)   //password
//$pdo = new PDO('mysql:host=localhost;dbname=votre_base', 'utilisateur', 'mot_de_passe');
class Dbh {
        private $serverName;
        Private $User;
        private $password;
        private $dbname;
        private $charset;

        public function connect($dbName){
           $this ->serverName ="localhost";
           $this ->User = "root";
           $this ->password = "";
           $this ->dbname = $dbName;
           $this ->charset = "utf8mb4";
           try {
                 $dsn = "mysql:host=". $this ->serverName .";dbname=".$this ->dbname.";charset=".$this ->charset;
                 $pdo = new PDO($dsn, $this ->User,  $this ->password);
                 $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                 return $pdo;
              
           } catch (PDOException $e) {
                   echo 'failed to establish connection:'.$e->getMessage();
           }
          
        }
}
?>
