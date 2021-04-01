<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IsArrayRuleTest
 */
class Test_Gring_Validator_Rule_IsArrayRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个数组
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage families must array!
     */
    public function testIsArrayRule() {
        $data = array(
            "families" => "father",
        );

        $rules = array(
            "families" => "IsArray",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsArray Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个数组
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage families must array!
     */
    public function testIsArrayRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "families" => "father",
                ),
            ),
        );

        $rules = array(
            "array.*.families" => "IsArray",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsArray Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个数组
     */
    public function testIsArrayRuleSuccess() {
        $data = array(
            "families" => array(),
        );

        $rules = array(
            "families" => "IsArray",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个数组
     */
    public function testIsArrayRuleEmptySuccess() {
        $data = array(
            "family" => array(),
        );

        $rules = array(
            "families" => "IsArray",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个数组
     */
    public function testIsArrayRuleNotEmptySuccess() {
        $data = array(
            "families" => array(
                array(
                    'father' => 'bob',
                    'children' => array()
                )
            ),
        );

        $rules = array(
            "families" => "IsArray",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个数组
     */
    public function testUnsetIsArrayRuleEmptySuccess() {
        $data = array();

        $rules = array(
            "families" => "IsArray",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
