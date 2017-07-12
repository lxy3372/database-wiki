<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-06
 * Time: 19:16
 */

namespace App\Busi\Modules\DB;


use App\Busi\Modules\BaseBusi;
use App\Http\Requests\TableListRo;
use App\Models\Tables;

class TableListBusi extends BaseBusi
{

	public function handle(TableListRo $ro)
	{
		$db = [$ro->db];
		$fields = ['table_schema', 'table_name', 'table_type', 'engine', 'table_rows', 'data_length', 'auto_increment', 'create_time', 'table_comment'];
		$list = Tables::whereIn('table_schema', $db)->get($fields);
		return $list->toArray();
	}
	
}