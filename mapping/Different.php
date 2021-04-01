<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Mapping_Different
 */
class Gring_Validator_Mapping_Different extends Gring_Validator_Mapping_Base
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * Confirm constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);
        if (isset($values['attribute'])) {
            $this->name = $values['attribute'][0];
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
