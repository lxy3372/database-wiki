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
		$list = Tables::whereTableSchema($ro->db)->whereTableName($ro->table_name)->get();
		return $list->toArray();
	}

}