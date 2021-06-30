<?php

namespace Snday\Custom;
use Snday\Custom\Traits\EloquentTrait;

class Customize{
	use EloquentTrait;

	public function __construct($_model=''){
		$this->_model = new $_model;
	}

	public function getData(){
		// return response($this->model->get());
	}

	public function storeData($request, $uploadFile=false){
		return $this->store($request, $uploadFile);
	}

	public function updateData($id, $request, $uploadFile=false){
		return $this->update($id, $request, $uploadFile);
	}

	public function deleteData($id){
		return $this->destroy($id);
	}
}