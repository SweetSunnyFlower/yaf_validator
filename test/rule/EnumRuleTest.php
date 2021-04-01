<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_EnumRuleTest
 */
class Test_Gring_Validator_Rule_EnumRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须在枚举数组里面
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is invalid enum
     */
    public function testEnumRule() {
        $data = array(
            "type" => "4",
        );

        $rules = array(
            "type" => "Enum:1,2,3",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Enum Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在枚举数组里面
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is invalid enum
     */
    public function testEnumRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "type" => "4",
                ),
            ),
        );

        $rules = array(
            "array.*.type" => "Enum:1,2,3",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Enum Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在枚举数组里面
     */
    public function testEnumRuleSuccess() {
        $data = array(
            "type" => 2,
        );

        $rules = array(
            "type" => "Enum:1,2,3",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须在枚举数组里面
     */
    public function testUnsetEnumRuleSuccess() {
        $data = array();

        $rules = array(
            "type" => "Enum:1,2,3",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
