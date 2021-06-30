<?php

namespace Snday\Custom\Traits;

trait FileTrait{
	public function uploadFile($request, $data=[]){
		foreach ($request as $key => $value) {
			if (is_object($value)) {
				$this->singleFile($value, empty($data) ? '' : $data->$key);
				return $key;
			}else if (is_array($value)) {
				$this->multipleFile($value, empty($data) ? '' : $data->$key);
				return $key;
			}
		}
	}

	public function deleteFile($old_file){
		$old = public_path().'/upload_files/'.$this->_model->getTable().'/'.$old_file;
		if ($old_file && file_exists($old)) {
			\File::delete($old);
		}
	}

	public function singleFile($file, $old_file=''){
		// if image exist
		$this->deleteFile($old_file);
		$file->move(public_path().'/upload_files/'.$this->_model->getTable(), $file->getClientOriginalName());	
		$this->filename = $file->getClientOriginalName();	
	}

	public function multipleFile($file, $old_file=''){
		foreach (explode(',', $old_file) as $key => $value) {
			$this->deleteFile($value);
		}
		$filename = '';
		foreach ($file as $mult_value) {
			$mult_value->move(public_path().'/upload_files/'.$this->_model->getTable(), $mult_value->getClientOriginalName());
			$filename .= $mult_value->getClientOriginalName().',';
		}
		substr($filename, 0, -1);
		$this->filename = $filename;
	}
}