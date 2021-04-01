<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 10:47 上午
 * description :
 */

class Gring_Validator_Helper_Validator
{
    /**
     * @var string
     */
    private static $mobilePattern = '/^1\d{10}$/';

    /**
     * @var string
     */
    private static $emailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/';

    /**
     * @var string
     */
    private static $ipPattern = '/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/';

    /**
     * @param $value
     * @return bool
     */
    public static function validateEmail($value)
    {
        if (!preg_match(self::$emailPattern, $value)) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @param $values
     * @return bool
     */
    public static function validateEnum($value, $values)
    {
        if (in_array($value, $values)) {
            return true;
        }

        return false;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function validateIp($value)
    {
        if (!preg_match(self::$ipPattern, $value)) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function validatelength($value, $min, $max)
    {
        $length = mb_strlen($value);
        if ($length < $min || $length > $max) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function validateMobile($value)
    {
        if (!preg_match(self::$mobilePattern, $value)) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @param $regex
     * @return bool
     */
    public static function validatePattern($value, $regex)
    {
        if (!preg_match($regex, $value)) {
            return false;
        }

        return true;
    }

    /**
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function validateRange($value, $min, $max)
    {
        if ($value < $min || $value > $max) {
            return false;
        }

        return true;
    }
}