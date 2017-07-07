<?php

namespace App\Http\Controllers;

use App\Busi\Modules\DB\TableListBusi;
use Illuminate\Http\Request;

class TableListController extends Controller
{
	
	public function index(TableListBusi $busi)
	{
		return response()->packet($busi->response());	
	}
	
}
