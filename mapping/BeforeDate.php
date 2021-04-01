<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_BeforeDate
 */
class Gring_Validator_Mapping_BeforeDate extends Gring_Validator_Mapping_Base
{
    /**
     * @var string
     */
    private $date = '';

    /**
     * BeforeDate constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->date = $values['attribute'][0];
        }
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}
