<?php

/**
 * class Gring_Validator_Rule_RangeRule
 */
class Gring_Validator_Rule_RangeRule extends Gring_Validator_Contract_RuleAbstract
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
        if (!isset($data[$propertyName]) || empty($data[$propertyName])) {
            return $data;
        }
        /* @var Gring_Validator_Mapping_Range $item */
        $min = $item->getMin();
        $max = $item->getMax();
        $value = $data[$propertyName];
        if (Gring_Validator_Helper_Validator::validateRange($value, $min, $max)) {
            return $data;
        }

        $message = $item->getMessage();

        $message = (empty($message)) ? sprintf('%s is invalid range(min=%d, max=%d)', $propertyName, $min, $max) :
            $message;

        $this->throwException($message);
    }
}