<?php 

class DB{
   public $host = "127.0.0.1";
   private $user = "root";
   private $pass = '';
   private $db = 'restaurant';

   public function __construct()
   {
       echo 'construct';
   }

   public function selectData()
   {
       echo 'Select Data';
   }

   public function getDatabase()
   {
       return $this->db;
   }

   public function show()
   {
       $this->selectData();
   }

   static function insertData()
   {
       echo 'static';
   }
}

$db = new DB;

// $db->selectData();

DB::insertData();

// echo '<br>';

// echo $db->host;

// echo '<br>';

// echo $db->getDatabase();

?>