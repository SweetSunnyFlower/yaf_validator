<?php

/**
 * class Gring_Validator_Rule_DateRangeRule
 */
class Gring_Validator_Rule_DateRangeRule extends Gring_Validator_Contract_RuleAbstract
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
        /* @var Gring_Validator_Mapping_DateRange $item */
        $start = $item->getStart();
        $end = $item->getEnd();
        $value = $data[$propertyName];
        if (!isset($value) || empty($value)) {
            return $data;
        }
        if (is_string($value)) {
            $dt = DateTime::createFromFormat("Y-m-d H:i:s", $value);
            if (($dt !== false && !array_sum($dt::getLastErrors())) && strtotime($value) >= strtotime($start) && strtotime($value) <= strtotime($end)) {
                return $data;
            } elseif (ctype_digit($value)) {
                if (date('Y-m-d', (int) $value) && $value >= $start&& $value <= $end) {
                    return $data;
                }
            }
        } elseif (filter_var($value, FILTER_VALIDATE_INT)) {
            if ($value >= strtotime($start) && $value <= $end) {
                return $data;
            }
        }
        $message = $item->getMessage();
        $message = (empty($message)) ?
            sprintf('%s is invalid  date range(start=%s, end=%s)', $propertyName, $start, $end) : $message;
        $this->throwException($message);
    }
}
