<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link as Link;

class LinkController extends Controller
{
	protected $id=10;

    public function redirect()
	{
		$id = (trim($_SERVER['REQUEST_URI'],'/'));
		$address = Link::where('id',$id)->firstOrFail()->original_adress;

		return header("Location:". $address);
		die();
	}

	public function store(Request $request)
	{
		if(Link::where('original_adress',request('original_address'))!=Null)
		{
			$link = Link::where('original_adress',request('original_address'))->firstOrFail();

			return view('input',[
				'link'=>$link
			]);
		}


		$link = Link::create([
			'original_adress'=>request('original_address')
		]);

		return view('input',[
			'link'=>$link
		]);
	}

	function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
