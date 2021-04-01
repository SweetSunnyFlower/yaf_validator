<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_AfterDate
 */
class Gring_Validator_Mapping_AfterDate extends Gring_Validator_Mapping_Base
{
    /**
     * @var string
     */
    private $date = '';

    /**
     * AfterDate constructor.
     *
     * @param $values
     */
    public function __construct($values)
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
