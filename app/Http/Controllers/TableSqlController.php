<?php

namespace App\Http\Controllers;

use App\Busi\Modules\DB\TableSqlBusi;

class TableSqlController extends Controller
{
	
	public function index(TableSqlBusi $busi)
	{
		$ret = $busi->response();
		return response()->packet($ret);	
	}
	
}
