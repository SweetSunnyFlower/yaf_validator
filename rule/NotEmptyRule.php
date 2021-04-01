<?php

/**
 * class Gring_Validator_Rule_NotEmptyRule
 */
class Gring_Validator_Rule_NotEmptyRule extends Gring_Validator_Contract_RuleAbstract
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

        if (!isset($value)) {
            return $data;
        }
        /* @var Gring_Validator_Mapping_NotEmpty $item */
        if (!empty($value)) {
            return $data;
        }

        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s can not be empty!', $propertyName) : $message;
        $this->throwException($message);
    }
}
