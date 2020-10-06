<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link as Link;

class LinkController extends Controller
{

    public function redirect()
	{
		$id = (trim($_SERVER['REQUEST_URI'],'/'));
		$address = Link::where('id',$id)->firstOrFail()->original_adress;

		return header("Location:". $address);
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
