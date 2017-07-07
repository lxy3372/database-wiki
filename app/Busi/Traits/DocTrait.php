<?php
/**
 * Created by PhpStorm.
 * User: zhangsir <fei@zhangsir.me>
 * Date: 17-2-14
 * Time: 下午4:27
 */

namespace App\Busi\Traits;

use Illuminate\Support\Arr;
use ReflectionClass;
use ReflectionProperty;

trait DocTrait
{
    private $verifyFields = ['required', 'int', 'number', 'enum'];

    private $fieldTypes = ['integer', 'float', 'string', 'binary', 'file'];

    /**
     * parse reflection class
     *
     * @param $ro
     * @return array
     */
    public function parseReflectionClass($ro)
    {
        $class = new ReflectionClass($ro);

        $header = $this->parseComment($class->getDocComment(), false);
        $properties = $class->getProperties(ReflectionProperty::IS_PUBLIC);
        $params = [];
        foreach($properties as &$property) {
            $docblock = $property->getDocComment();
            $name = $property->getName();
            $info = $this->parseComment($docblock);
            $info['field'] = $name;
            $info = array_merge($info, $this->parseProperty($info['properties']));
            $params[] = $info;
        }

        return [ $header, $params ];
    }

    /**
     * @param $content
     * @param bool $compatible
     * @return array
     */
    private function parseComment($content, $compatible = true)
    {
        $doclines = explode("\n", str_replace(["\r\n","\r"],"\n", $content));
        $verifyField = implode('|', $this->verifyFields);

        $name = null;
        $fields = [];
        foreach($doclines as $line) {
            if (is_null($name)) {
                if (preg_match('/\* (.+)/', $line, $match)) {
                    $name = trim($match[1]);
                }

                if (strpos($line, '@') !== false) {
                    $name = '';
                }
            }

            /*if ($compatible && preg_match('/@([\S]+)/', $line, $match)) {
                @list($key, $param) = explode('|', $match[1]);
                $fields[$key] = $param;
            }

            if ($compatible && preg_match('/@(var) ([\S]+)/', $line, $match)) {
                $fields[$match[1]] = $match[2];
            }*/

            if ((preg_match('/@([\S]+) (\S+)/', $line, $match)
                || preg_match('/@([\S]+)(.*)/', $line, $match))) {
                @list($key, $param) = explode('|', $match[1]);
                $fields[$key] = [
                    'param' => $param,
                    'value' => $match[2]
                ];
            }
        }

        if (is_null($name)) $name = '';

        return [
            'title' => $name,
            'properties' => $fields
        ];
    }

    private function parseProperty($fields)
    {
        $type = 'string';
        $var = Arr::get($fields, 'var.value');
        if ($var && in_array($var, $this->fieldTypes)) {
            $type = Arr::get($fields, 'var.value');
        }

        foreach($fields as $k => $v ) {
            switch($k) {
                case 'var':
                    break;
                case 'enum':
                    $preg = '/([^,]+?)=([^,]+)/';
                    if (preg_match_all($preg, $v['value'], $matchs, PREG_SET_ORDER)) {
                        /*$type = 'array';*/
                    }
                    break;
            }
        }

        return [
            'type' => $type
        ];
    }

    /**
     * @param $values
     */
    public function filter(&$values)
    {
        $fields = [
            'cid', 'lang', 'channel', 'ck', 'sys_version',
            'device', 'version', 'plat_form'
        ];
        foreach($values as $i => $value) {
            if (in_array($value['field'], $fields)) {
                unset($values[$i]);
            }
        }
    }
}