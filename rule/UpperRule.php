<?php

/**
 * class Gring_Validator_Rule_UpperRule
 */
class Gring_Validator_Rule_UpperRule extends Gring_Validator_Contract_RuleAbstract
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
        $value = $data[$propertyName];
        $rule = '/^[A-Z]+$/';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_Upper $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be uppercase alpha', $propertyName) : $message;

        $this->throwException($message);
    }
}
