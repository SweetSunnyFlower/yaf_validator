<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IsBoolRuleTest
 */
class Test_Gring_Validator_Rule_IsBoolRuleTest extends TestCase {

    /**
     * @desc 验证参数值必须是一个boolean值
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage isCheck must bool!
     */
    public function testIsBoolRule() {
        $data = array(
            "isCheck" => "1",
        );

        $rules = array(
            "isCheck" => "IsBool",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsBool Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个boolean值
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage isCheck must bool!
     */
    public function testIsBoolRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "isCheck" => "1",
                ),
            ),
        );

        $rules = array(
            "array.*.isCheck" => "IsBool",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsBool Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个boolean值
     */
    public function testIsBoolRuleSuccess() {
        $data = array(
            "isCheck" => true,
        );

        $rules = array(
            "isCheck" => "IsBool",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个boolean值
     */
    public function testUnsetIsBoolRuleSuccess() {
        $data = array();

        $rules = array(
            "isCheck" => "IsBool",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
