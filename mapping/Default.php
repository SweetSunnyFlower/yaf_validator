<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/10/9 10:50 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_Default
 */
class Gring_Validator_Mapping_Default extends Gring_Validator_Mapping_Base {
    public static $type_map_value = array(
        'Int' => 0,
        'String' => '',
        'Array' => array(),
        'Float' => 0.00,
        'Null' => null,
        'Bool' => true,
    );

    /**
     * @var string
     */
    private $defaultValue;

    /**
     * @var string
     */
    private $type;

    public function __construct(array $values) {
        parent::__construct($values);

        if (isset($values['attribute'])) {
            $this->type = $values['attribute'][0];
            if (isset($values['attribute'][1])) {//设置的默认值
                $this->type = ucfirst($this->type);
                $type = "convert{$this->type}";
                if (method_exists($this, $type)) {
                    $this->defaultValue = $this->$type($values['attribute'][1]);
                } else {
                    $this->defaultValue = self::$type_map_value[$this->type];
                }
            } else {
                $this->defaultValue = self::$type_map_value[$this->type];
            }
        }
    }

    /**
     * @return mixed|string
     */
    public function getDefaultValue() {
        return $this->defaultValue;
    }

    /**
     * @param $value
     * @return int
     */
    protected function convertInt($value) {
        return intval($value);
    }

    /**
     * @param $value
     * @return string
     */
    protected function convertString($value) {
        return strval($value);
    }

    /**
     * @param $value
     * @return string
     */
    protected function convertFloat($value) {
        return floatval($value);
    }

    /**
     * @param $value
     * @return bool
     */
    protected function convertBool($value) {
        if (true === $value || 'true' === $value) {
            return true;
        }

        return false;
    }

}