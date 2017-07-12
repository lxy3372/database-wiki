<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-07
 * Time: 17:16
 */

namespace App\Busi\Modules\DB;


use App\Busi\Modules\BaseBusi;
use App\Http\Requests\TableDetailRo;
use App\Models\Columns;
use App\Models\Tables;

/**
 * Class TableDetailBusi
 *
 * @package App\Busi\Modules\DB
 */
class TableDetailBusi extends BaseBusi
{

	/**
	 * 
	 * @param TableDetailRo $ro 请求object
	 *
	 * @return array
	 */
	public function handle(TableDetailRo $ro)
	{
		$fields = ['table_schema', 'table_name', 'column_name', 'column_default', 'is_nullable', 'data_type', 'character_set_name', 'column_type', 'column_comment','column_key'];
		$list = Columns::whereTableSchema($ro->db)->whereTableName($ro->table_name)->get($fields);
		return $list->toArray();
	}

}