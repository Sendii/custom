<?php

namespace Snday\Custom\Traits;

trait FileTrait{
	public function uploadFile($request){
		foreach ($request as $key => $value) {

			if (is_object($value)) {
				$this->singleFile($value);
			}else if (is_array($value)) {
				$this->multipleFile($value);
			}
		}
	}

	public function singleFile($file){
		$file->move(public_path().'/upload_files/'.$this->_model->getTable(), $file->getClientOriginalName());
	}

	public function multipleFile($file){
		foreach ($file as $mult_value) {
			$mult_value->move(public_path().'/upload_files/'.$this->_model->getTable(), $mult_value->getClientOriginalName());
		}
	}
}