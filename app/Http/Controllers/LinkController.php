<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link as Link;

class LinkController extends Controller
{

    public function redirect(Link $link)
	{
		return header("Location:".$link->original_address);
	}

	public function store()
	{

		if(Link::where('original_adress',request('original_address'))->first()!= Null)
		{
			$link = Link::where('original_adress',request('original_address'))->firstOrFail();

			return view('input',[
				'link'=>$link
			]);

		}else{
			$link = Link::create([
			'original_adress'=>request('original_address')
			]);

			return view('input',[
				'link'=>$link
			]);
		}
	}
}
