<?php

namespace App\Http\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser{

    protected function successResponse($data, $code = 200)
	{
		return response()->json([
			'success'=> true, 
			'result' => $data
		], $code);
	}

	protected function errorResponse($code, $message = null)
	{
		return response()->json([
			'success'=> false,
			'error' => $message
		], $code);
	}

}