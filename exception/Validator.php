<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:45 上午
 * description :
 */

/**
 * Class Gring_Validator_Exception_Validator
 */
class Gring_Validator_Exception_Validator extends Exception
{
    /**
     *  Gring_Validator_Exception_Validator constructor.
     * @desc 自己定义参数验证状态码，可以在此处使用日志library库，统一打印日志
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct($message = "", $code = 9001, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}