<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IsStringRuleTest
 */
class Test_Gring_Validator_Rule_IsStringRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个整型
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage string must string!
     */
    public function testIsStringRule() {
        $data = array(
            "string" => 1,
        );

        $rules = array(
            "string" => "IsString",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsString Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个整型
     */
    public function testIsStringRuleSuccess() {
        $data = array(
            "string" => "abcdefg",
        );

        $rules = array(
            "string" => "IsString",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个整型
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage string must string!
     */
    public function testIsStringRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "string" => 1,
                ),
            ),
        );

        $rules = array(
            "array.*.string" => "IsString",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsString Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个整型
     */
    public function testUnsetIsStringRuleSuccess() {
        $data = array();

        $rules = array(
            "string" => "IsString",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
