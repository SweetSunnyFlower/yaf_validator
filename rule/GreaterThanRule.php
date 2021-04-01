<?php

/**
 * class Gring_Validator_Rule_GreaterThanRule
 */
class Gring_Validator_Rule_GreaterThanRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_GreaterThan $item */
        $name = $data[$item->getName()] ?? '';
        $value = $data[$propertyName];
        if (!isset($value) || empty($value)) {
            return $data;
        }
        settype($name, "float");
        settype($value, "float");
        if ($value > $name) {
            return $data;
        }
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be greater than %s field', $propertyName, $item->getName()) :
            $message;
        $this->throwException($message);
    }
}
