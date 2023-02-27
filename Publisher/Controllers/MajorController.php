<?php
require_once("Models/Registrator.php");
class MajorController
{
	private $model;

	public function __construct()
	{
		$this->model = new Registration();
	}

	function index()
	{
		require_once("Views/Register.php");
	}

	function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$hoten = $_POST['name'];
			$lop = $_POST['class'];
			$chuyennganh = $_POST['major'];
			$mssv = $_POST['studentId'];
			$this->model->addStudent($mssv, $hoten, $lop, $chuyennganh);
			header("Location: Index.php");
		}
	}
}
