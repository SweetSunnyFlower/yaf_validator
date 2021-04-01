<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_EmailRuleTest
 */
class Test_Gring_Validator_Rule_EmailRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个有效的邮箱地址
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage email must be a email
     */
    public function testEmailRule() {
        $data = array(
            "email" => "v_gaobingbing_dxm@@duxiaoman.com",
        );

        $rules = array(
            "email" => "Email",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Email Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个有效的邮箱地址
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage email must be a email
     */
    public function testEmailRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "email" => "v_gaobingbing_dxm@@duxiaoman.com",
                ),
            ),
        );

        $rules = array(
            "array.*.email" => "Email",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Email Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个有效的邮箱地址
     */
    public function testEmailRuleSuccess() {
        $data = array(
            "email" => "v_gaobingbing_dxm@duxiaoman.com",
        );

        $rules = array(
            "email" => "Email",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个有效的邮箱地址
     */
    public function testUnsetEmailRuleSuccess() {
        $data = array();

        $rules = array(
            "email" => "Email",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
