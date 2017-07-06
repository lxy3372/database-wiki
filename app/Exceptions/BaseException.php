<?php
/**
 * Created by PhpStorm.
 * User: Ricky
 * Date: 16/10/24
 * Time: 下午9:10
 */

namespace App\Exceptions;

use Exception;

/**
 * 业务自定义异常类
 * 
 * Class BaseException
 *
 * @package App\Exceptions
 */
class BaseException extends Exception
{
    
    protected $lang_filename = 'error.';

    /**
     * @var array  抛出异常需要携带额外附属data
     */
    public $data;

    public function __construct($code, array $value = [], array $data = []) {
        $notice = trans($this->lang_filename.$code, $value);
        $this->data = $data;
        parent::__construct($notice, $code);
    }

    /**
     * 砰
     *
     * @warning 不要触摸-小心爆炸
     * @param $code
     */
    public static function touch($code)
    {
        throw new static($code);
    }

}


