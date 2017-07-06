<?php

namespace App\Http\Controllers;

use App\Busi\Modules\DB\DBListBusi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	
	public function index(DBListBusi $busi)
	{
		$ret = $busi->response()->getData();
		var_dump($ret);
	}
	
}
