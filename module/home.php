<?php

/**
 * @Author: ELL
 * @Date:   2018-01-17 01:02:46
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-01-17 09:21:22
 */
class home{

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


    public function countPasien(){
    	 try {
            $sql    = "select count(*)  as jumlah from pasien";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

     public function countDokter(){
    	 try {
            $sql    = "select count(*)  as jumlah from dokter";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

     public function countObat(){
    	 try {
            $sql    = "select count(*)  as jumlah from dokter";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

     public function countPoli(){
    	 try {
            $sql    = "select count(*)  as jumlah from poli";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll($params = []) {
        try {
            $sql    = "select a.*, b.name as nama_poli, c.name as nama_pasien, d.name  as nama_dokter from medical_record a, poli b, pasien c, dokter d 
                      WHERE a.id_poli = b.id and a.id_pasien = c.id and a.id_dokter = d.id ORDER BY a.id ASC";
            $query  = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}