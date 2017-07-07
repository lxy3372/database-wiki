<?php
/**
 * Created by PhpStorm.
 * User: Ricky
 * Date: 16/12/23
 * Time: 下午5:13
 */

namespace App\Http\Result;


/**
 * Busi 统一返回对象Result基类
 * 
 * Class Result
 *
 * @package App\Http\Result
 */
class Result
{
    /**
     * @var array
     */
    protected $data = [];


    public function __construct($data = [])
    {
        $this->data = $data;
    }
    
    public function setData($data)
    {
        return $this->data = $data;
    }
    
    public function getData()
    {
        return $this->data;
    }

    public function toArray()
    {
        return ['data' => $this->data];
    }

}