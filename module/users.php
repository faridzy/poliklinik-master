<?php

/**
 * @Author: ELL
 * @Date:   2018-01-16 15:24:22
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-01-16 19:31:28
 */
class users
{
    private $user   = "farid22";
    private $pass   = "farid22";
    private $host   = "
    (DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
        (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = XE)
        )
    )";
    public $conn;
    public $isConnect   = false;
    public $table       = 'users';
    public $text;
    public $status;
    public $message     = [];

    public function __construct() {
        $this->dbConnect();
    }

    public function dbConnect() {
        try {
            $conn       = new PDO("oci:dbname=" . $this->host, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn = $conn;
            $this->isConnect = true;

//            echo "Connection success";
        } catch (PDOException $e) {
            echo "Error Connection : " . $e->getMessage();
        }
    }

    public function dbDisconnect() {
        $this->conn         = null;
        $this->isConnect    = false;
    }

    public function getAll($params = []) {
        try {
            $sql    = "select * from users";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getByID($id, $params = []) {
        try {
            $sql    = "select * from users where id=$id";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

   

    public function create($page, $params = []) {
        try {
            $getID  = $this->conn->prepare("select * from (select * from $this->table ORDER BY id DESC) WHERE ROWNUM = 1");
            $getID->execute();
            $resultGetID = $getID->fetch(PDO::FETCH_ASSOC);

            if ($resultGetID['ID'] > 0)
                $id = $resultGetID['ID'] + 1;
            else
                $id = 1;

	         $password=md5($params[password]);


            $sql    = "INSERT INTO $this->table (ID,NAME, EMAIL, PASSWORD, ACTIVE) VALUES 
                      ($id, '$params[name]', '$params[email]','$password','$param[active]')";
            $query  = $this->conn->prepare($sql);
            $query->execute();

            $this->text             = "Data berhasil disimpan";
            $this->status           = "success";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location  ='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }

    public function update($page, $id, $params = []) {
        try {
        	$password=md5($params[password]);

            try {
                $sql = "UPDATE $this->table set NAME = '$params[name]', EMAIL = '$params[email]', 
                    PASSWORD = '$password', ACTIVE='$param[active]' 
                    WHERE ID = $id";
                $query = $this->conn->prepare($sql);
                $query->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->text             = "Data berhasil diubah";
            $this->status           = "info";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function delete($page, $id) {
        try {
            $sql    = "DELETE FROM $this->table WHERE ID = $id";
            $query  = $this->conn->prepare($sql);
            $query->execute();

            $this->text             = "Data berhasil dihapus";
            $this->status           = "info";
            $this->message          = [
                'text'      => $this->text,
                'status'    => $this->status
            ];
            $_SESSION['message']    = $this->message;
            echo "<script>location='?p=$page';</script>";
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }
}