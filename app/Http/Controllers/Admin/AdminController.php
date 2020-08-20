<?php

namespace App\Http\Controllers\Admin;

use League\Flysystem\File;
use App\User;
use App\Http\Controllers\Controller;
//use Intervention\Image\Facades\Image;
class AdminController extends Controller
{
	public function __construct()
	{
		//auth()->loginUsingId('2');
	}

	public function StandardPath()
	{
		$standard = str_replace('\\', '/', public_path());
		return $standard;
	}

	public function ImageDelete($path)
	{
		if (file_exists($path))
			$delete = File::delete($path);
		else
			$delete = false;

		return $delete;
	}

	public function ImageUploade($file, $pubpath = null)
	{
		#Uploade Image
		$filename = time() . "-" . rand(2, 512) . "." . $file->getClientOriginalExtension();
		$path = public_path('Uploads/' . $pubpath);
		$files = $file->move($path, $filename);

		/*
		* You can use getRealpath() function becuase this function public_path() to 
		* get picture elements and any thing that you need :)
		*/
		//getRealPath() =>  $path."/".$filename

		#Resize Image
		/*
		$img=Image::make( $files->getRealPath() );
		$img->resize("200","200");
		$img->save($path."/Small-".$filename);
		*/
		return '/Uploads/' . $pubpath . $filename;
	}

	#Search From Panel Admin Use index method in Controller
	public function search($model = User::class, $field, $data, $pagin = 10)
	{
		$results = $model::latest()->orderBy($field)->paginate($pagin);
		if (sizeof($data) > 0)
			if (array_key_exists('search', $data)) {
				$results = $model::where($field, 'like', '%' . $data['search'] . '%')->orderBy($field)->paginate($pagin);
			}

		return $results;
	}

	#Search From Panel Admin Use index method in Controller With Condition Eleqouent Object 
	public function searchCondition($customResult, $field, $data, $pagin = 10)
	{
		if (sizeof($data) > 0 && array_key_exists('search', $data)) {
			$findResults = $customResult->where($field, 'like', '%' . $data['search'] . '%')->orderBy($field)->paginate($pagin);
		} else
			$findResults = $customResult;


		return $findResults;
	}
}
