<?php

/**
 * class Gring_Validator_Rule_MinRule
 */
class Gring_Validator_Rule_MinRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_Min $item */
        $min = $item->getValue();
        $value = $data[$propertyName];
        if ($value >= $min) {
            return $data;
        }

        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s is too small(min=%d)', $propertyName, $min) : $message;

        $this->throwException($message);
    }
}
