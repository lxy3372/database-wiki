<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-07
 * Time: 11:32
 */

namespace App\Http\Requests;


/**
 * Class TableDetailRo
 *
 * @url /table/detail
 * @package App\Http\Requests
 */
class TableDetailRo extends BaseRo
{

	/**
	 * @var 表名
	 * @required
	 */
	public $table_name;

}