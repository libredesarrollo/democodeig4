<?php

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Person extends BaseController
{

	public function index()
	{

		$people = new PersonModel();

		$data = [
			'people' => $people->asObject()->paginate(10),
			'pager' => $people->pager
		];

		return view('person/index', $data);
	}

	public function edit($id)
	{
		session();

		$personModel = new PersonModel();
		$person = $personModel->asObject()->find($id);

		if ($person == null) {
			throw PageNotFoundException::forPageNotFound();
		}

		$validation = \Config\Services::validation();

		return view('person/edit', ['validation' => $validation, 'person' => $person]);
	}

	public function update($id)
	{

		$personModel = new PersonModel();
		$person = $personModel->asObject()->find($id);

		if ($person == null) {
			throw PageNotFoundException::forPageNotFound();
		}

		if ($this->validate('person')) {
			$personModel->update(
				$id,
				[
					'name' => $this->request->getPost('name'),
					'surname' => $this->request->getPost('surname'),
					'age' => $this->request->getPost('age'),
					'description' => $this->request->getPost('description'),
				]
			);
			return redirect()->to('/person')->with('message', 'Persona actualizada exitosamente: ' . $person->name);
		}

		// tenemos problemas con las validaciones
		return redirect()->back()->withInput();
	}

	public function new()
	{
		session();

		$validation = \Config\Services::validation();

		return view('person/new', ['validation' => $validation]);
	}
	public function create()
	{

		$person = new PersonModel();

		if ($this->validate('person')) {
			$person->insert(
				[
					'name' => $this->request->getPost('name'),
					'surname' => $this->request->getPost('surname'),
					'age' => $this->request->getPost('age'),
					'description' => $this->request->getPost('description'),
				]
			);
			return redirect()->to('/person')->with('message', 'Persona creada exitosamente');
		}

		// tenemos problemas con las validaciones
		return redirect()->back()->withInput();
	}

	public function delete($id)
	{

		$personModel = new PersonModel();
		$person = $personModel->asObject()->find($id);

		if ($person == null) {
			throw PageNotFoundException::forPageNotFound();
		}

		$personModel->delete($id);

		// tenemos problemas con las validaciones
		return redirect()->to('/person')->with('message', 'Persona eliminada exitosamente: ');
	}


	//--------------------------------------------------------------------

}
