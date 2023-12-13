<?php

namespace App\Controllers;

use App\Core\Controller;

class Orders extends Controller
{
	public object $model;

	public function __construct()
	{
		parent::cekLogin();

		$this->model = new \App\Models\Orderes();
	}

	public function index()
	{
		$data['rows'] = $this->model->show();
		$this->dashboard('orders/index', $data);
	}

	public function input()
	{
		$this->dashboard('orders/input');
	}

	public function save()
	{
		$this->model->save();
		header('location:' . URL . '/orders');
	}

	public function edit($id)
	{
		$data['row'] = $this->model->edit($id);
		$this->dashboard('orders/edit', $data);
	}

	public function update()
	{
		$this->model->update();
		header('location:' . URL . '/orders');
	}

	public function delete($id)
	{
		$this->model->delete($id);
		header('location:' . URL . '/orders');
	}
}
