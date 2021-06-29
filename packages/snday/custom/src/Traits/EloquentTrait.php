<?php

namespace Snday\Custom\Traits;
use Snday\Custom\Traits\FileTrait;

trait EloquentTrait{
	use FileTrait;


	public function store(array $request, $uploadFile=false){
		\DB::beginTransaction();
		$status = false;

		try {
			if ($uploadFile) {
				$this->uploadFile($request);
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
}