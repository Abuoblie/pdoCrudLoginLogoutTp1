<?php

include_once 'connect.php';

class Handle extends Dbh
{
        public function age($date)
        {
                $tYear = date('Y');
                $tMonth = date('m');
                $tDay  = date('d');
                $bYear = date("Y", strtotime($date));
                $bMonth = date("m", strtotime($date));
                $bDay  = date("d", strtotime($date));

                $age = $tYear - $bYear;
                if ($bMonth > $tMonth) {
                        $age--;
                } else if (($tMonth == $bMonth) && ($bDay > $tDay)) {
                        $age--;
                }
                return $age;
        }
        public function prepIsert($dataBase,  $Firstname, $Lastname, $DateOfbirth, $Address, $PostaleCode, $TelephoneNumber, $idservice )
        {
                $sql = "INSERT INTO tp1user(Firstname, Lastname, DateOfbirth, Address, PostaleCode, TelephoneNumber , idservice)
                                    values(?,?,?,?,?,?,?) 
                
                "; // sql query 
                $stmt = $this->connect($dataBase)->prepare($sql); // create a connection with the query created above;
                $stmt->execute([$Firstname, $Lastname, $DateOfbirth, $Address, $PostaleCode, $TelephoneNumber, $idservice]);
        }

        public function Login($dataBase, $Firstname, $Lastname)
        {
                $sql = "SELECT * FROM tp1user WHERE Firstname = ? and  Lastname = ?";
                $stmt = $this->connect($dataBase)->prepare($sql);
                $stmt->execute([$Firstname, $Lastname]);

                if ($row = $stmt->fetch()) {
                        $_SESSION['Firstname'] = $row['Firstname'];
                        $_SESSION['Lastname'] = $row['Lastname'];
                        header("Location:/TpBecode/index.php");
                        exit();
                } else {
                        echo "login failed";
                        header("Location:/TpBecode/index.php");
                }
        }

        public function delete($dataBase, $sqlCond)
        {
                $sql = "DELETE FROM tp1user WHERE idUser = ?"; // sql query 
                $stmt = $this->connect($dataBase)->prepare($sql); // create a connection with the query created above;
                $stmt->execute([$sqlCond]);
        }

        public function insert($dataBase, $Firstname, $Lastname,  $DateOfbirth, $Address, $PostaleCode, $TelephoneNumber, $idservice )
        {
                $sql = "SELECT * FROM tp1user WHERE Firstname = ? and  Lastname = ?";
                $stmt = $this->connect($dataBase)->prepare($sql);
                $stmt->execute([$Firstname, $Lastname]);

                if ($row = $stmt->fetch()) {
                        echo "sorry this name and sur name already taken click on add user to try again";
                } 
                else {

                     $this->prepIsert($dataBase,  $Firstname, $Lastname, $DateOfbirth, $Address, $PostaleCode, $TelephoneNumber, $idservice ); 
                     echo "data successfully added";
                     header("Location:..\index.php");
                }
        }





        


        public function getUser($condition, $attribute, $dataBase)
        {
                $sql = "SELECT * FROM  tp1user as a join service as b on a.idservice = b.idservice  where $attribute = ? ";                                     //select statement or sql query
                $stmt = $this->connect($dataBase)->prepare($sql); // create a connection with the query created above;
                $stmt->execute([$condition]);
                while ($row = $stmt->fetch()) {
                        $age = $this->age($row['DateOfbirth']);
                        $id = $row['idUser'];

                        echo "<tr><td>{$row['Firstname']}</td>
                        <td>{$row['Lastname']}</td>
                        <td>$age</td>
                        <td>{$row['Address']}</td>
                        <td>{$row['PostaleCode']}</td>
                        <td>{$row['TelephoneNumber']}</td>
                        <td>{$row['Name']}</td>
                        <td><button><a href='index.php?id=$id'>delete</a></button></td></tr>
                        ";
                }
        }
}
