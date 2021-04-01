<?php

/**
 * class Gring_Validator_Rule_DateRule
 */
class Gring_Validator_Rule_DateRule extends Gring_Validator_Contract_RuleAbstract
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
        if (is_string($value)) {
            $dt = DateTime::createFromFormat("Y-m-d H:i:s", $value);
            if ($dt !== false && !array_sum($dt::getLastErrors())) {
                return $data;
            } elseif (ctype_digit($value)) {
                if (date('Y-m-d', (int) $value)) {
                    return $data;
                }
            }
        } elseif (filter_var($value, FILTER_VALIDATE_INT)) {
            if ($value >= PHP_INT_MIN && $value <= PHP_INT_MAX) {
                return $data;
            }
        }
        /* @var Gring_Validator_Mapping_Date $item */
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must date!', $propertyName) : $message;
        $this->throwException($message);
    }
}
