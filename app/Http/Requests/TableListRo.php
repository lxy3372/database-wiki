<?php
/**
 * Created by PhpStorm.
 * User: Me@rikyliu.com
 * Date: 2017-07-10
 * Time: 10:03
 */

namespace App\Http\Requests;


/**
 * Class TableListRo
 *
 * @get
 * @url /table/list
 * @package App\Http\Requests
 */
class TableListRo extends BaseRo
{

	/**
	 * @var 数据库名
	 * @required 
	 */
	public $db;

}