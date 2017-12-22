<?php
/**
 * Created by PhpStorm.
 * User: Me@rikyliu.com
 * Date: 2017-07-06
 * Time: 16:36
 */

namespace App\Busi\Traits;

use App\Models\Columns;
use App\Models\Tables;

trait TableTrait
{

	/**
	 * 获取表列表
	 *
	 * @param mixed $db
	 * @param array $fields
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getTableList($db, array $fields)
	{
		$list = Tables::whereTableSchema($db)->get($fields);
		return $list;
	}
	
	public function getTableDetail($table)
	{
		$columns = Columns::whereTableName($table)->get();
	}

}