<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LetterRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Upload;
use Hekmatinasser\Verta\Verta;
class LettersController extends Controller
{
	public function index(Request $request)
	{
		return view('home');
	}
	public function create()
	{
		return view('letters.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\ProductRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make(
				$request->all(),
				[
					'daftarKol' => 'required',
				],
				[
						'daftarKol.required' => ' فیلد الزامی است ',
				]
				);

		// for ajax
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
		$request->session()->put('daftarKol', $request->daftarKol);
//		$request->session()->put('letterDate', Verta::createTimestamp((int)$request->letterDate)->format("Y-m-d H:i:s"));
		$request->session()->put('nationalCode', $request->nationalCode);
		$request->session()->put('bankCode', $request->bankCode);

		return response()->json(['status' => 1]);
		}
	}
//	public function search()
//	{
//		return view('letters.search');
//	}

	public function storeImage(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			],
			[
				'image.image' => 'فایل انتخاب شده باید تصویر باشد',
				'image.mimes' => 'فایل انتخاب شده باید یکی از پسوندهای jpg - png - gif را داشته باشد',
				'image.max' => 'حداگثر حجم فایل باید :max  کیلوبایت باشد'
			]
		);

		// for ajax
		if ($validator->fails()) {
			return response()->json([
				'status' => 0,
				'errors' => $validator->errors()->toArray()
			]);
		}
		$uploadedFile = $request->file('image');
		$filename = time().$uploadedFile->getClientOriginalName();
		Storage::disk('public')->putFileAs(
			'files/',
			$uploadedFile,
			$filename
		);
		$request->session()->push('attachments', asset('storage/files/'.$filename));
		return response()->json([
			'status' => 1,
			'url' => asset('storage/files/'.$filename)]);
		/*
		if ($validatedData->errors()->image()) {
			$response = [
					'image_error' => $validatedData->errors()->image()->first()
			];
		}
		else {
			$response = [
					'image_error' => "mo"
			];
		}

		//$response = $validatedData;
		//$response["data"]["success"] = true;
		return response()->json($response);
		*/
	}
}
