<?php

/**
 * class Gring_Validator_Rule_ChsRule
 */
class Gring_Validator_Rule_ChsRule extends Gring_Validator_Contract_RuleAbstract
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
        $value = $data[$propertyName];
        if (!isset($value) || empty($value)) {
            return $data;
        }
        $rule = '/^[\x{4e00}-\x{9fa5}]+$/u';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_Chs $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be Chinese characters', $propertyName) : $message;

        $this->throwException($message);
    }

}
