<?php

/**
 * class Gring_Validator_Rule_IsArrayRule
 */
class Gring_Validator_Rule_IsArrayRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_IsArray $item */
        $message = $item->getMessage();
        $value = $data[$propertyName];
        if (!isset($value) || empty($value)) {
            return $data;
        }
        if (is_array($value)) {
            return $data;
        }

        $message = (empty($message)) ? sprintf('%s must array!', $propertyName) : $message;
        $this->throwException($message);
    }
}
