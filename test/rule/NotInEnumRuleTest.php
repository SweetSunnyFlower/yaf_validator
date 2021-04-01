<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_NotInEnumRuleTest
 */
class Test_Gring_Validator_Rule_NotInEnumRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须不在枚举数组中
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is exists in enum
     */
    public function testNotInEnumRule() {
        $data = array(
            "type" => "1",
        );

        $rules = array(
            "type" => "NotInEnum:1,2,3",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert not in enum Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须不在枚举数组中
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is exists in enum
     */
    public function testNotInEnumRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "type" => "1",
                ),
            ),
        );

        $rules = array(
            "array.*.type" => "NotInEnum:1,2,3",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert not in enum Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须不在枚举数组中
     */
    public function testNotInEnumRuleSuccess() {
        $data = array(
            "type" => "4",
        );

        $rules = array(
            "type" => "NotInEnum:1,2,3",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须不在枚举数组中
     */
    public function testUnsetNotInEnumRuleSuccess() {
        $data = array();

        $rules = array(
            "type" => "NotInEnum:1,2,3",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
