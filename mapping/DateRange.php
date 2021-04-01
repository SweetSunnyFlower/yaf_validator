<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_DateRange
 */
class Gring_Validator_Mapping_DateRange extends Gring_Validator_Mapping_Base
{
    /**
     * @var string
     */
    private $start = '';

    /**
     * @var string
     */
    private $end = '';

    /**
     * DateRange constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->start = $values['attribute'][0];
            $this->end = $values['attribute'][1];
        }
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }
}
