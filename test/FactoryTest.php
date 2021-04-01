<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 11:54 上午
 * description : 测试用例
 */

use PHPUnit\Framework\TestCase;

class Test_Gring_Validator_FactoryTest extends TestCase {
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage rule map not exist
     */
    public function testInvalidArgumentMap() {
        $data = array(
            "id" => 1,
            "name" => "gaobingbing",
        );

        $rules = array(
            'id' => 'undefinedRule',
            'name' => 'Required',
        );
        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert InvalidArgumentRules throw exception with invalid argument.');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage rule not exist
     */
    public function testInvalidArgumentRules() {
        $data = array(
            "id" => 1,
            "name" => "gaobingbing",
        );

        $rules = array(
            'id' => 'Base',
            'name' => 'Required',
        );
        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert InvalidArgumentRules throw exception with invalid argument.');
    }

    /**
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionCode 10086
     * @expectedExceptionMessage id must exist!
     */
    public function testSetErrorCodeRules() {
        $data = array(
            "name" => "gaobingbing",
        );

        $rules = array(
            'id' => 'Required',
            'name' => 'Required',
        );
        Gring_Validator_Factory::validate($data, $rules, [], 10086);
        $this->fail('Failed to assert InvalidArgumentRules throw exception with invalid argument.');
    }


    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage rules must exist
     */
    public function testRulesNotExist() {
        $data = array(
            "id" => 1,
            "name" => "gaobingbing",
        );

        $rules = array(
        );
        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert InvalidArgumentRules throw exception with invalid argument.');
    }
}