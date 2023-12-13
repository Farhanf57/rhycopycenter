<?php

namespace App\Controllers;

use App\Core\Controller;

class Customers extends Controller
{
	public object $model;

	public function __construct()
	{
		parent::cekLogin();

		$this->model = new \App\Models\Customer();
	}

	public function index()
	{
		$data['rows'] = $this->model->show();
		$this->dashboard('customers/index', $data);
	}

	public function input()
	{
		$this->dashboard('customers/input');
	}

	public function save()
	{
		$this->model->save();
		header('location:' . URL . '/customers');
	}

	public function edit($id)
	{
		$data['row'] = $this->model->edit($id);
		$this->dashboard('customers/edit', $data);
	}

	public function update()
	{
		$this->model->update();
		header('location:' . URL . '/customers');
	}

	public function delete($id)
	{
		$this->model->delete($id);
		header('location:' . URL . '/customers');
	}
}
