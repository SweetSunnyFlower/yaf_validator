<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/10/12 4:50 下午
 * description :
 */

/**
 * Class Gring_Validator_Contract_RuleAbstract
 */
abstract class Gring_Validator_Contract_RuleAbstract implements Gring_Validator_Contract_RuleInterface
{

    public $errorCode;

    /**
     * @return self
     */
    abstract static function getInstance();

    /**
     * @param $data
     * @param $propertyName
     * @param $item
     * @return array
     */
    public function isArray($data, $propertyName, $item){
        $isArrayData = explode(".*.", $propertyName);
        if (count($isArrayData) > 1) {//是数组
            foreach ($data[$isArrayData[0]] as $key => $value) {
                /* @var Gring_Validator_Contract_RuleInterface $this */
                $this->validate($value, $isArrayData[1], $item);
            }
//            return $data;
        }
        return array();
    }

    /**
     * @param $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode){
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @param $message
     * @throws Gring_Validator_Exception_Validator
     */
    public function throwException($message){
        throw new Gring_Validator_Exception_Validator($message, $this->errorCode);
    }
}