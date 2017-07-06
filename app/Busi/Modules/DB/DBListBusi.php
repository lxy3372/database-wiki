<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-06
 * Time: 14:03
 */

namespace App\Busi\Modules\DB;
use App\Busi\Modules\BaseBusi;
use App\Models\Tables;
use Illuminate\Database\Eloquent\Model;

class DBListBusi extends BaseBusi
{
	
	public function handle()
	{
		$ret = Tables::whereTableSchema('test')->get(['table_name', 'table_comment'])->toArray();
		return $ret;
	}

}