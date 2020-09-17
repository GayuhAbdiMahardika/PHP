<?php 

    class DB{

        private $host = "127.0.0.1";
        private $user = "root";
        private $pass = '';
        private $db = 'dbrestoran';
        private $conn;

        public function __construct()
        {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        }


// Dengan method ini dapat mengambil semua data dari tblkategori tanpa memasukkan syntax SQL ke parameter
        // public function getAll()
        // {
        //     $sql = "SELECT * FROM tblkategori";
        //     $result = mysqli_query($this->conn, $sql);
        //     while ($row=mysqli_fetch_assoc($result)){
        //         $data[] = $row;
        //     }
        //     return $data;
        // }

        public function getALL($sql)
        {
            $result = mysqli_query($this->conn, $sql);
            while ($row=mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            if(!empty($data)){
               return $data; 
            }
            
        }


//Dengan method ini dapat mengambil data dari tblkategori tanpa memasukkan syntax SQL ke parameter, hanya perlu memasukkan id langsung ke paramater
//Contoh : $db->getById(10)
        // public function getById($id)
        // {
        //     $sql = "SELECT * FROM tblkategori WHERE idkategori=$id";
        //     $result = mysqli_query($this->conn, $sql);
        //     return mysqli_fetch_assoc($result);
        // }

        public function getITEM($sql)
        {
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

//Method ini dapat berjalan tanpa parameter syntax SQL
        // public function rowCount()
        // {
        //     $sql = "SELECT * FROM tblkategori";
        //     $result = mysqli_query($this->conn, $sql);
        //     return mysqli_num_rows($result);
        // }

        public function rowCount($sql)
        {
            $result = mysqli_query($this->conn, $sql);
            $count = mysqli_num_rows($result);
            return $count;
        }

        public function runSQL($sql)
        {
            $result = mysqli_query($this->conn, $sql);
        }

        public function massage($text)
        {
            echo $text;
        }
    }

    $db = new DB;
?>