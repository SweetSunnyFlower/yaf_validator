<?php

/**
 * class Gring_Validator_Rule_LowRule
 */
class Gring_Validator_Rule_LowRule extends Gring_Validator_Contract_RuleAbstract
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
        $rule = '/^[a-z]+$/';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_Low $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be lowercase alpha', $propertyName) : $message;

        $this->throwException($message);
    }
}
