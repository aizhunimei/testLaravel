<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CatsController extends Controller {

	public function index() {
		$cats = Cat::simplePaginate(15);
		return response()->view('cats.index', compact('cats'));
	}

	public function show($id) {
		$cat = Cat::find($id);
		if (null == $cat) {
			return response()->view('errors.404');
		}
		$title = $cat->title;

		$thumb_path = 'public/cat/'.$cat->id.'/'.$cat->thumb;
		$url_path = 'public/cat/'.$cat->id.'/'.$cat->url;
		
		if (Storage::exists($thumb_path)) {
			$thumb = Storage::url($thumb_path);
		} else {
			$thumb = $cat->thumb;
		}

		if (Storage::exists($url_path)) {
			$url = Storage::url($url_path);
		} else {
			$url = $cat->url;
		}

		return response()->view('cats.show', ['title' => $title, 'thumb' => $thumb, 'url' => $url]);
	}



}
