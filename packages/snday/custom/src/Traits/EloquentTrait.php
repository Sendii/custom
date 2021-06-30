<?php

namespace Snday\Custom\Traits;
use Snday\Custom\Traits\FileTrait;

trait EloquentTrait{
	use FileTrait;
	public $filename;

	public function store(array $request, $uploadFile=false){
		\DB::beginTransaction();
		$status = false;

		try {
			if ($uploadFile) {
				$field_file = $this->uploadFile($request);
				// update file field  
				$request[$field_file] = $this->filename;
			}
			$this->_model->create($request);

			\DB::commit();
			$status = true;
		} catch (\Exception $e) {
			\DB::rollback();

			throw $e;
		}
		return $status ? 'Berhasil Menambah Data' : 'Gagal Menambah Data';
	}

	public function update($id, array $request, $uploadFile=false){
		\DB::beginTransaction();
		$status = false;

		try {
			$table = $this->_model->findOrFail($id);

			if ($uploadFile) {
				$field_file = $this->uploadFile($request, $table);
				// update file field  
				$request[$field_file] = $this->filename;
			}
			$table->update($request);

			\DB::commit();
			$status = true;
		} catch (\Exception $e) {
			\DB::rollback();

			throw $e;
		}
		return $status ? 'Berhasil Mengubah Data' : 'Gagal Mengubah Data';
	}

	public function destroy($id){
		\DB::beginTransaction();
		$status = false;

		try {
			$table = $this->_model->findOrFail($id)->delete();

			\DB::commit();
			$status = true;
		} catch (\Exception $e) {
			\DB::rollback();

			throw $e;
		}
		return $status ? 'Berhasil Menghapus Data' : 'Gagal Menghapus Data';
	}
}