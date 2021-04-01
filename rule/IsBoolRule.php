<?php

/**
 * class Gring_Validator_Rule_IsBoolRule
 */
class Gring_Validator_Rule_IsBoolRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_IsBool $item */
        $message = $item->getMessage();
        if ($value == 'true' || $value == 'false' || is_bool($value)) {
            $data[$propertyName] = (bool) $value;
            return $data;
        }

        $message = (empty($message)) ? sprintf('%s must bool!', $propertyName) : $message;
        $this->throwException($message);
    }
}
