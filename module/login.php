<?php

/**
 * @Author: ELL
 * @Date:   2018-01-16 13:38:56
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-01-17 00:37:03
 */
class login{


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


	public function loginAdmin($username,$password){
        try
       {
          $password2=md5($password);
          $sql    = "select * from $this->table where password='$password2' and name='$username'";
          $query  = $this->conn->prepare($sql);
          $params = array(
            ":name" => $username
          );

          $query->execute($params);
          $result = $query->fetch(PDO::FETCH_ASSOC);
          // $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          // $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          // $userRow=$stmt->fetch(PDO::FETCH_ASSOC);


          if(!is_null($result))
          {
                session_start();
                $_SESSION['activeUser']['name']=$username;
                header('location:index.php');
            
          }else{

                header('location:login.php?alert=1');
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }

	} 

}