<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 6:46 下午
 * description :
 */

/**
 * class Gring_Validator_Rule_RequiredIfRule
 */
class Gring_Validator_Rule_RequiredIfRule extends Gring_Validator_Contract_RuleAbstract
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
     * @throws Gring_Validator_Exception_Validator
     */
    public function validate($data, $propertyName, $item)
    {
         $this->isArray($data, $propertyName, $item);
        /* @var Gring_Validator_Mapping_RequiredIf $item */
        $message = $item->getMessage();
        $key = $item->getKey();
        $value = $item->getValue();
        if ($data[$key] == $value){
            if (!isset($data[$propertyName])) {
                $message = (empty($message)) ? sprintf('%s must exist!', $propertyName) : $message;
                $this->throwException($message);
            }
        }
        return $data;
    }
}