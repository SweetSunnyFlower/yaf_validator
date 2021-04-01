<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/10/9 10:48 上午
 * description :
 */

/**
 * class Gring_Validator_Rule_DefaultRule
 */
class Gring_Validator_Rule_DefaultRule extends Gring_Validator_Contract_RuleAbstract
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * @param $data
     * @param $propertyName
     * @param $item
     * @return mixed
     */
    public function validate($data, $propertyName, $item)
    {
        $value = $data[$propertyName];
        if (!isset($value)) {
            /* @var Gring_Validator_Mapping_Default */
            $data[$propertyName] = $item->getDefaultValue();
        }
        return $data;
    }
}