<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_LengthRuleTest
 */
class Test_Gring_Validator_Rule_LengthRuleTest extends TestCase {
    /**
     * @desc 验证参数值长度限制
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage password is invalid length(min=8, max=16)
     */
    public function testLengthRule() {
        $data = array(
            "password" => "1234567",
        );

        $rules = array(
            "password" => "Length:8,16",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Length Rule throw exception.');
    }

    /**
     * @desc 验证参数值长度限制
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage password is invalid length(min=8, max=16)
     */
    public function testLengthRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "password" => "1234567",
                ),
            ),
        );

        $rules = array(
            "array.*.password" => "Length:8,16",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Length Rule throw exception.');
    }

    /**
     * @desc 验证参数值长度限制
     */
    public function testLengthRuleSuccess() {
        $data = array(
            "password" => "12345678",
        );

        $rules = array(
            "password" => "Length:8,16",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 验证参数值长度限制
     */
    public function testUnsetLengthRuleSuccess() {
        $data = array();

        $rules = array(
            "password" => "Length:8,16",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
