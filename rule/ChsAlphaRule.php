<?php

/**
 * class Gring_Validator_Rule_ChsAlphaRule
 */
class Gring_Validator_Rule_ChsAlphaRule extends Gring_Validator_Contract_RuleAbstract
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
        $rule = '/^[\x{4e00}-\x{9fa5}a-zA-Z]+$/u';
        if (preg_match($rule, $value)) {
            return $data;
        }

        /* @var Gring_Validator_Mapping_ChsAlpha $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be Chinese characters or alpha', $propertyName) : $message;

        $this->throwException($message);
    }

}
