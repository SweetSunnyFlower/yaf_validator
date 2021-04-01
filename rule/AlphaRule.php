<?php

/**
 * class Gring_Validator_Rule_AlphaRule
 */
class Gring_Validator_Rule_AlphaRule extends Gring_Validator_Contract_RuleAbstract
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
        $rule = '/^[A-Za-z]+$/';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_Alpha $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be an alpha', $propertyName) : $message;

        $this->throwException($message);
    }
}
