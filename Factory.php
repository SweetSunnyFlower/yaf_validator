<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 11:54 上午
 * description :
 */

class Gring_Validator_Factory {
    /**
     * @desc 解析之后的数据
     * @var array
     */
    protected $parsedData;

    /**
     * @desc 解析后规则的属性
     * @var array
     */
    protected $parsedAttributes;

    /**
     * @var array
     */
    protected $parsedMessage;

    /**
     * @desc 解析之后的规则
     * @var array
     */
    protected $parsedRules;

    /**
     * @desc 属性标记位
     * @var string
     */
    protected $attributeIdentifier = "__attributeIdentifier__";

    /**
     * Validator_Factory constructor.
     */
    public function __construct() {
    }

    /**
     * @param  array  $data
     * @param  array  $rules
     * @param $errorCode
     * @param  array  $messages
     * @return array
     * @example $messages = array('id.require' => 'id is required', 'id.int' => 'id is int');
     * @example $rules = array('id' => 'required|int');
     * @throws Gring_Validator_Exception_Validator
     */
    public function check(array $data, array $rules, $errorCode, array $messages = array()) {
        $this->parseData($data);
        $this->parseRules($rules);
        $this->parseAttribute();
        $this->parseMessage($messages);
        $this->doValidator($errorCode);

        return $this->parsedData;
    }

    /**
     * @param  array  $errorCode
     * @throws Gring_Validator_Exception_Validator
     */
    public function doValidator($errorCode) {
        foreach ($this->parsedRules as $key => $rule) {
            foreach ($rule as $item) {
                $initMap = array();
                $initMap['message'] = $this->parsedMessage["{$key}.{$item}"];
                if (isset($this->parsedAttributes["{$key}.{$item}"])) {
                    $initMap['attribute'] = $this->parsedAttributes["{$key}.{$item}"];
                }
                $mapClassName = "Gring_Validator_Mapping_{$item}";
                if (!class_exists($mapClassName)) {
                    throw new InvalidArgumentException('rule map not exist');
                }
                $map = new $mapClassName($initMap);
                $ruleClassName = "Gring_Validator_Rule_{$item}Rule";
                if (!class_exists($ruleClassName)) {
                    throw new InvalidArgumentException('rule not exist');
                }
                /* @var Gring_Validator_Contract_RuleAbstract $ruleClassName */
                $this->parsedData = $ruleClassName::getInstance()->setErrorCode($errorCode)->validate(
                    $this->parsedData,
                    $key,
                    $map
                );
            }
        }
    }

    /**
     * @param $rules
     */
    public function parseRules($rules) {
        if (empty($rules)) {
            throw new InvalidArgumentException('rules must exist');
        }
        foreach ($rules as $key => $rule) {
            //将规则中的|替换成功规则标记位
            $arrayRule = explode('|', $rule);
            $this->parsedRules[$key] = $arrayRule;
        }
    }

    /**
     * @desc 解析规则属性
     */
    public function parseAttribute() {
        foreach ($this->parsedRules as $key => $rule) {
            foreach ($rule as $index => $item) {
                //解决时间相关规则`:`冲突,将规则中属性的:替换成功属性标记位
                $item = preg_replace("/:/", $this->attributeIdentifier, $item, 1);
                $attribute = explode($this->attributeIdentifier, $item);
                if (count($attribute) > 1) {//带属性带
                    $this->parsedRules[$key][$index] = $attribute[0];
                    $this->parsedAttributes["$key.$attribute[0]"] = explode(',', $attribute[1]);
                }
            }
        }
    }

    /**
     * @param $data
     * @throws Gring_Validator_Exception_Validator
     */
    public function parseData($data) {
        $this->parsedData = $data;
    }

    /**
     * @param  array  $messages
     */
    public function parseMessage($messages = array()) {
        $this->parsedMessage = $messages;
    }

    /**
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  int  $errorCode
     * @return array
     * @throws Gring_Validator_Exception_Validator
     */
    public static function validate(
        array $data,
        array $rules,
        array $messages = array(),
        $errorCode = Gring_Validator_Exception_Code::DEFAULT_ERROR_CODE
    ) {
        return (new self())->check($data, $rules, $errorCode, $messages);
    }
}