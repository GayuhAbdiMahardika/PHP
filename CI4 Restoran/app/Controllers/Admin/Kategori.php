<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		echo 'Belajar';
	}

	public function select()
	{
		$model = new Kategori_M();
		$kategori = $model->findAll();

		$data = [
			'judul' => "SELECT DATA DARI CONTROLLER",
			'kategori' => $kategori
		];
		echo view('kategori/select.php',$data);
	}

	public function formInsert($id=null, $nama=null)
	{
		echo view('kategori/forminsert.php');
	}

	public function formUpdate($id=null)
	{
		echo view('template/header.php');
		echo view('kategori/update.php');
		echo view('template/footer.php');
	}

	//--------------------------------------------------------------------

}
