<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 6:46 下午
 * description :
 */

class Gring_Validator_Rule_RequiredRule extends Gring_Validator_Contract_RuleAbstract {
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
        /* @var Gring_Validator_Mapping_Required $item */
        $message = $item->getMessage();
        if (!isset($data[$propertyName]) || $data[$propertyName] === '') {
            $message = (empty($message)) ? sprintf('%s must exist!', $propertyName) : $message;
            $this->throwException($message);
        }

        return $data;
    }
}