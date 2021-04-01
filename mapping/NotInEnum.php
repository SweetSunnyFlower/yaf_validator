<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_NotInEnum
 */
class Gring_Validator_Mapping_NotInEnum extends Gring_Validator_Mapping_Base
{
    /**
     * @var array
     */
    private $values = [];

    /**
     * NotInEnum constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);

        if (isset($values['attribute'])) {
            $this->values = $values['attribute'];
        }
    }


    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }
}
