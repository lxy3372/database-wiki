<?php
/**
 * Created by PhpStorm.
 * User: Ricky
 * Date: 16/10/24
 * Time: 下午7:32
 */

namespace App\Http\Requests;

use App\Exceptions\RoException;
use App\Util\VerifyRoUtil;
use Auth;
use ReflectionClass;
use ReflectionProperty;

/**
 * Request Object
 * Class BaseRo
 */
Class BaseRo
{
    /**
     * 平台
     *
     * @var int
     */
    public $plat_form=1;

    /**
     * 渠道
     *
     * @var int
     */
    public $channel;

    /**
     * 语言
     *
     * @var string
     * @enum|cn,en
     */
    public $lang = 'cn';

    /**
     * 客户端设备id
     *
     * @var string
     */
    public $cid;

    /**
     * 参数校验ck
     *
     * @var string
     */
    public $ck;

    /**
     * 平台版本
     *
     * @var string
     */
    public $sys_version;

    /**
     * 设备信息
     *
     * @var string
     */
    public $device;

    /**
     * 客户端版本
     *
     * @var int
     */
    public $version;

    /**
     * token
     *
     * @var string
     */
    public $access_token;


    protected $maps = [];

    function __construct($request = array())
    {
        if (function_exists('app')) {
            $params = app()->request->all();
            $request = array_merge($params, $request);
        }
        $this->inject($request);
        $this->before_check();
        $this->checkAttr();
        $this->after_check();
    }

    /**
     * 注入属性
     *
     * @param $request
     */
    public function inject($request)
    {
        // 处理字段映射
        foreach ($this->maps as $key => $field) {
            if (array_key_exists($key, $request)) {
                $this->{$field} = $request[$key];
            }
        }

        foreach ($this as $key => &$item) {
            if (array_key_exists($key, $request)) {
                $item = $request[$key];
            }
        }
    }

    /**
     * Object to Array
     *
     * @param bool $unsetNull
     *
     * @return array
     */
    public function toArray($unsetNull = false)
    {
        $arr = [];
        foreach ($this as $key => $item) {
            if($unsetNull && !$item) continue;
            $arr[$key] = $item;
        }

        return $arr;
    }

    /**
     * @return \App\Models\User
     */
    public function user()
    {
        return Auth::user();
    }

    /**
     * @return bool
     */
    public function isLogin()
    {
        Auth::shouldUse('api');
        return Auth::check();
    }

    protected function before_check() {

    }

    /**
     * 检测属性
     */
    protected function checkAttr()
    {
        $class = new ReflectionClass($this);

        $properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach($properties as &$property) {
            $docblock = $property->getDocComment();
            $name = $property->getName();
            $doclines = explode("\n", str_replace(array("\r\n","\r"),"\n", $docblock));
            foreach($doclines as $line) {
                $line_arr = explode('@', $line);
                if (count($line_arr) < 2) continue;
                $match = explode(" ", $line_arr[1])[0];
                @list($method, $param) = explode("|", $match);
                if (!method_exists('App\Util\VerifyRoUtil', $method)) continue;
                try {
                    if (is_string($param)) {
                        $args = explode(',', $param);
                        array_unshift($args, $name, $this->$name);
                        call_user_func_array([VerifyRoUtil::class, $method], $args);
                    } else {
                        VerifyRoUtil::$method($name, $this->$name);
                    }
                } catch (RoException $e) {
                    $this->handleException($e);
                }

            }
        }
    }

    protected function handleException(RoException $e)
    {
        throw $e;
    }

    protected function after_check()
    {

    }


}
