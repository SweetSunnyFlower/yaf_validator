<?php

/**
 * class Gring_Validator_Rule_AlphaNumRule
 */
class Gring_Validator_Rule_AlphaNumRule extends Gring_Validator_Contract_RuleAbstract
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
        $rule = '/^[A-Za-z0-9]+$/';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_AlphaNum $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be an alpha or number', $propertyName) : $message;

        $this->throwException($message);
    }
}
