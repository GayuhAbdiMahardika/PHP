<?php 

    class DB{

        private $host = "127.0.0.1";
        private $user = "root";
        private $pass = '';
        private $db = 'restaurant';
        private $conn;

        public function __construct()
        {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        }

        public function getAll()
        {
            $sql = "SELECT * FROM category";
            $result = mysqli_query($this->conn, $sql);
            while ($row=mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }

        public function getById($id)
        {
            $sql = "SELECT * FROM category WHERE id=$id";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_fetch_assoc($result);
        }

        public function rowCount()
        {
            $sql = "SELECT * FROM category";
            $result = mysqli_query($this->conn, $sql);
            return mysqli_num_rows($result);
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

?>