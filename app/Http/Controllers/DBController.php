<?php

namespace App\Http\Controllers;

use App\Busi\Modules\DB\DBListBusi;
use Illuminate\Http\Request;

class DBController extends Controller
{
	
	public function index(DBListBusi $busi)
	{
		$ret = $busi->response();
		return response()->packet($ret);	
	}
	
}
