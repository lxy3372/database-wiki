<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-06
 * Time: 19:16
 */

namespace App\Busi\Modules\DB;


use App\Busi\Modules\BaseBusi;
use App\Models\Tables;

class TableListBusi extends BaseBusi
{

	public function handle()
	{
		$dbs = ['test'];
		$list = Tables::whereIn('table_schema', $dbs)->get()->toArray();
		var_dump($list);
		return $list;
	}
	
}