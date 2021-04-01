<?php

/**
 * class Gring_Validator_Rule_IsIntRule
 */
class Gring_Validator_Rule_IsIntRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_IsInt $item */
        $message = $item->getMessage();
        $value = $data[$propertyName];
        $value = filter_var($value, FILTER_VALIDATE_INT);
        if ($value !== false) {
            $data[$propertyName] = $value;
            return $data;
        }
        $message = (empty($message)) ? sprintf('%s must int!', $propertyName) : $message;
        $this->throwException($message);
    }
}
