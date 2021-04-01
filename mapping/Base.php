<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 5:32 下午
 * description :
 */

class Gring_Validator_Mapping_Base
{

    /**
     * @var string
     */
    public $message = '';

    /**
     * Gring_Validator_Mapping_Base constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['message'])) {
            $this->message = $values['message'];
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

}