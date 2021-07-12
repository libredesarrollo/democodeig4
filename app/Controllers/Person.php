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

		return $this->_loadDefaultView("Listado",$data,"index");

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

		return $this->_loadDefaultView("Editar",['validation' => $validation, 'person' => $person],"edit");
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

			$res = $this->_upload($id);

			if($res == null) {
				return redirect()->to('/person')->with('message', 'Persona actualizada exitosamente: ' . $person->name);
			}

			return redirect()->back()->withInput();
		}

		// tenemos problemas con las validaciones
		//return redirect()->back()->withInput();
	}

	public function new()
	{
		session();

		$validation = \Config\Services::validation();

		$person = new PersonModel();

		return $this->_loadDefaultView("Crear",['validation' => $validation, "person" => $person],"new");
	}
	public function create()
	{

		$person = new PersonModel();

		if ($this->validate('person')) {
			$id = $person->insert(
				[
					'name' => $this->request->getPost('name'),
					'surname' => $this->request->getPost('surname'),
					'age' => $this->request->getPost('age'),
					'description' => $this->request->getPost('description'),
				]
			);

			$res = $this->_upload($id);

			if($res == null) {
				return redirect()->to('/person')->with('message', 'Persona creada exitosamente' );
			}else{
				return redirect()->to("/person/$id/edit")->withInput();
			}

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


	private function _upload($id)
	{
		
		if($imageFile = $this->request->getFile('image')){
			
			if($imageFile->isValid() && !$imageFile->hasMoved()){
				
				// validaciones

				$validated = $this->validate([
					'image' => [
						'uploaded[image]',
						'mime_in[image,image/jpg,image/gif,image/png]'
					]
				]);

				if($validated){
					echo "ok";

					$newName = $imageFile->getRandomName();
					//$imageFile->move(WRITEPATH . 'uploads/avatar/', $newName);

					$imageFile->move(ROOTPATH.'public/uploads', $newName);

					$personModel = new PersonModel();

					$personModel->update($id, [
						'image' => $newName
					]);
					
					return null;
					
				}else {

					return $this->validator->getError("image");
				}


			}
		}
	}

	private function _loadDefaultView($title,$data,$view){
		echo view('templates/header',['title' => $title]);
		echo view("person/$view", $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}