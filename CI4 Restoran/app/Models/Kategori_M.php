<?php 
namespace App\Models;
use CodeIgniter\Model;

class Kategori_M extends Model{
    protected $table = 'tblkategori';
    protected $allowedFields = ['kategori','keterangan'];
    protected $primaryKey = 'idkategori';
}

?>