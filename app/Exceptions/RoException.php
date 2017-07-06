<?php
/**
 * Created by PhpStorm.
 * User: zhangsir
 * Date: 16-10-28
 * Time: 下午2:13
 */

namespace App\Exceptions;
use App\Exceptions\ErrorCode\RoError;

/**
 * RO 验证异常
 * Class RoException
 */
class RoException extends BaseException
{
    const NOTICE_ENV = [
        'dev','test','testing','gamma'
    ];

    public $attribute;

    protected $lang_filename = 'ro_error.';



    public function __construct($code, array $value = [], $attribute = '', \Exception $exception = null)
    {
        $this->attribute = $attribute;
        $notice = ['NOTICE' => ''];
        if(!empty($value) && in_array(env('APP_ENV'),self::NOTICE_ENV)){
            $notice['NOTICE'] = ','.$value['field'].RoError::RO_ERROR_NOTICE[$code].(empty($value['value']) ? '' : $value['value']);
        }
        parent::__construct($code, $notice);
    }

    public function getAttribute()
    {
        return $this->attribute;
    }
}