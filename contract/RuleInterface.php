<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2021/1/19 12:02 下午
 * description :
 */

interface Gring_Validator_Contract_RuleInterface {
    /**
     * @param $data
     * @param $propertyName
     * @param $item
     * @return mixed
     */
    public function validate($data, $propertyName, $item);
}