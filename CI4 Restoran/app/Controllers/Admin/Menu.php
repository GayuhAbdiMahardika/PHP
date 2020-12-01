<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class Menu extends BaseController
{
	public function index()
	{
		echo 'Belajar';
	}

	public function select()
	{
		echo'select';
	}

	public function update($id=null, $nama=null)
	{
		echo'update';
	}

	//--------------------------------------------------------------------

}
