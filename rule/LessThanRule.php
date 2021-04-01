<?php

/**
 * class Gring_Validator_Rule_LessThanRule
 */
class Gring_Validator_Rule_LessThanRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_LessThan $item */
        $name = $data[$item->getName()] ?? '';
        $value = $data[$propertyName];
        settype($name, "float");
        settype($value, "float");
        if ($value < $name) {
            return $data;
        }
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be less than %s field', $propertyName, $item->getName()) :
            $message;
        $this->throwException($message);
    }
}
