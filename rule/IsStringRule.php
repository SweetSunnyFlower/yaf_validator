<?php

/**
 * class Gring_Validator_Rule_IsStringRule
 */
class Gring_Validator_Rule_IsStringRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_IsString $item */
        $message = $item->getMessage();

        $value = $data[$propertyName];
        if (is_string($value)) {
            return $data;
        }

        $message = (empty($message)) ? sprintf('%s must string!', $propertyName) : $message;
        $this->throwException($message);
    }
}
