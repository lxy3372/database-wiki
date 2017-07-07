<?php

namespace App\Http\Controllers;

use App\Busi\Modules\DB\TableDetailBusi;
use Illuminate\Http\Request;

class TableDetailController extends Controller
{
	
	public function index(TableDetailBusi $busi)
	{
		$ret = $busi->response();
		return response()->packet($ret);	
	}
	
}
