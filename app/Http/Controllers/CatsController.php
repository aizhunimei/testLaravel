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
		$thumb = Storage::url('public/cat/'. $cat->id. '/'. $cat->thumb);
		$url = Storage::url('public/cat/'. $cat->id. '/'. $cat->url);
		return response()->view('cats.show', ['title' => $title, 'thumb' => $thumb, 'url' => $url]);
	}



}
