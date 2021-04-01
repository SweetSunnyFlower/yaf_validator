<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_LowRuleTest
 */
class Test_Gring_Validator_Rule_LowRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage lowName must be lowercase alpha
     */
    public function testLowRule() {
        $data = array(
            "lowName" => "Peter",
        );

        $rules = array(
            "lowName" => "Low",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Low Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage lowName must be lowercase alpha
     */
    public function testLowRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "lowName" => "Peter",
                ),
            ),
        );

        $rules = array(
            "array.*.lowName" => "Low",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Low Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是小写字母
     */
    public function testLowRuleSuccess() {
        $data = array(
            "lowName" => "peter",
        );

        $rules = array(
            "lowName" => "Low",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是小写字母
     */
    public function testUnsetLowRuleSuccess() {
        $data = array();

        $rules = array(
            "lowName" => "Low",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
