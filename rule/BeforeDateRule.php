<?php

/**
 * class Gring_Validator_Rule_BeforeDateRule
 */
class Gring_Validator_Rule_BeforeDateRule extends Gring_Validator_Contract_RuleAbstract {
    /**
     * @var
     */
    private static $instance;

    /**
     * @return self
     */
    public static function getInstance() {
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
    public function validate($data, $propertyName, $item) {
        $this->isArray($data, $propertyName, $item);
        /* @var Gring_Validator_Mapping_BeforeDate $item */
        $date = $item->getDate();
        if (isset($data[$date])) {
            $date = $data[$date];
        }
        $value = $data[$propertyName];
        if (!isset($value) || empty($value)) {
            return $data;
        }
        if (is_string($value)) {
            $dt = DateTime::createFromFormat("Y-m-d H:i:s", $value);
            if (($dt !== false && !array_sum($dt::getLastErrors())) && strtotime($value) <= strtotime($date)) {
                return $data;
            } elseif (ctype_digit($value)) {
                if (date('Y-m-d', (int)$value) && $value <= strtotime($date)) {
                    return $data;
                }
            }
        } elseif (filter_var($value, FILTER_VALIDATE_INT)) {
            if ($value <= $date) {
                return $data;
            }
        }
        $message = $item->getMessage();
        $message = (empty($message)) ? sprintf('%s must be before %s', $propertyName, $date) : $message;
        $this->throwException($message);
    }
}
