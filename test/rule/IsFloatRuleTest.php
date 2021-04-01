<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IsFloatRuleTest
 */
class Test_Gring_Validator_Rule_IsFloatRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个浮点值
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage amount must float!
     */
    public function testIsFloatRule() {
        $data = array(
            "amount" => "1.1.1",
        );

        $rules = array(
            "amount" => "IsFloat",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsFloat Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个浮点值
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage amount must float!
     */
    public function testIsFloatRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "amount" => "1.1.1",
                ),
            ),
        );

        $rules = array(
            "array.*.amount" => "IsFloat",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsFloat Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个浮点值
     */
    public function testIsFloatRuleSuccess() {
        $data = array(
            "amount" => 1.12,
        );

        $rules = array(
            "amount" => "IsFloat",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个浮点值
     */
    public function testUnsetIsFloatRuleSuccess() {
        $data = array();

        $rules = array(
            "amount" => "IsFloat",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
