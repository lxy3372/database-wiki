<?php
/**
 * Created by PhpStorm.
 * User: Me@rikyliu.com
 * Date: 2017-07-07
 * Time: 11:32
 */

namespace App\Http\Requests;


/**
 * Class TableDetailRo
 *
 * @get
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

	/**
	 * @var 库名
	 * @reuired
	 */
	public $db;

}