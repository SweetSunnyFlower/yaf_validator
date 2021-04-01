<?php

/**
 * class Gring_Validator_Rule_EmailRule
 */
class Gring_Validator_Rule_EmailRule extends Gring_Validator_Contract_RuleAbstract
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
        if (Gring_Validator_Helper_Validator::validateEmail($value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_Email $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be a email', $propertyName) : $message;

        $this->throwException($message);
    }
}
