<?php

namespace App\Controllers;

use App\Core\Controller;

class Produks extends Controller
{
	public object $model;

	public function __construct()
	{
		parent::cekLogin();

		$this->model = new \App\Models\Produk();
	}

	public function index()
	{
		$data['rows'] = $this->model->show();
		$this->dashboard('produks/index', $data);
	}

	public function input()
	{
		$this->dashboard('produks/input');
	}

	public function save()
	{
		$this->model->save();
		header('location:' . URL . '/produks');
	}

	public function edit($id)
	{
		$data['row'] = $this->model->edit($id);
		$this->dashboard('produks/edit', $data);
	}

	public function update()
	{
		$this->model->update();
		header('location:' . URL . '/produks');
	}

	public function delete($id)
	{
		$this->model->delete($id);
		header('location:' . URL . '/produks');
	}
}
