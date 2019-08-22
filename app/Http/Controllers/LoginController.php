<?php

namespace App\Http\Controllers;

use JWTAuth;

class LoginController extends Controller
{
	public function login()
	{
		$data = request()->all();

		try {
			if (!$token = JWTAuth::attempt($data)) {
				return response()->json(['error' => 'Invalid data'], 401);
			}
		}	catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}
		return response()->json(
			[
				'token' => $token,
			]
		);
	}
}