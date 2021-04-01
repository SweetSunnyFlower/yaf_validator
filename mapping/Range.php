<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_Range
 */
class Gring_Validator_Mapping_Range extends Gring_Validator_Mapping_Base
{
    /**
     * @var int
     */
    private $min = 0;

    /**
     * @var int
     */
    private $max = 0;

    /**
     * Range constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->min = $values['attribute'][0];
            $this->max = $values['attribute'][1];
        }
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }
}
