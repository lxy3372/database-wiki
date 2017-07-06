<?php
/**
 * Created by PhpStorm.
 * User: Ricky
 * Date: 16/12/23
 * Time: 下午3:49
 */

namespace App\Busi\Modules;

use App\Http\Result\Result;

interface BusiInterface
{
    
    /**
     * Busi 通用响应方法
     *
     * @return Result
     */
    public function response();

}

/**
 * Busi基类
 * 
 * Class BaseBusi
 *
 * @package App\Busi\Modules
 */
class BaseBusi implements BusiInterface
{
    /**
     * @var Result
     */
    protected $result = null;

    /**
     * BaseBusi constructor.
     *
     * @param array|null $handleParams
     * @param Result $result
     */
    public function __construct(array $handleParams = [], Result $result)
    {
        $this->result = $result;
        $data = app()->call([$this, 'handle'], $handleParams);
        if ($data instanceof Result) {
            $this->result = $data;
        } else if (!is_null($data)) {
            $this->result->setData($data);
        }
    }

    /**
     * @param Result $result
     */
    public function setResult(Result $result)
    {
        $this->result = $result;
    }

    /**
     * Busi 通用响应方法
     * @return Result
     */
    public function response()
    {
        return $this->result;
    }

}

