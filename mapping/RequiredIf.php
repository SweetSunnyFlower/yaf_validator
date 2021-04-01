<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_RequiredIf
 */
class Gring_Validator_Mapping_RequiredIf extends Gring_Validator_Mapping_Base
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $value;

    /**
     * Range constructor.
     *
     * @param  array  $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->key = $values['attribute'][0];
            $this->value = $values['attribute'][1];
        }
    }

    /**
     * @return mixed|string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
