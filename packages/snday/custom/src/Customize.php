<?php

namespace Snday\Custom;

class Customize{

	//get receive parame as new object
	public function __construct($_model=''){
		$this->model = new $_model;
	}

	public function getData(){
		dd($this->model->get());
	}

	public function storeData(array $request){
		\DB::beginTransaction();
		$status = false;

		try {
			$this->model->create($request);

			\DB::commit();
			$status = true;
		} catch (\Exception $e) {
			\DB::rollback();

			throw $e;
		}
		return $status ? 'Berhasil Menambah Data' : 'Gagal Menambah Data';
	}
}