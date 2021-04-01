<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_Min
 */
class Gring_Validator_Mapping_Min extends Gring_Validator_Mapping_Base
{
    /**
     * @var int
     */
    private $value = 0;

    /**
     * Min constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->value = $values['attribute'][0];
        }
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
