<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IsIntRuleTest
 */
class Test_Gring_Validator_Rule_IsIntRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个整型
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage tinyInt must int!
     */
    public function testIsIntRule() {
        $data = array(
            "tinyInt" => "1.1",
        );

        $rules = array(
            "tinyInt" => "IsInt",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsInt Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个整型
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage tinyInt must int!
     */
    public function testIsIntRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "tinyInt" => "1.1",
                ),
            ),
        );

        $rules = array(
            "array.*.tinyInt" => "IsInt",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert IsInt Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个整型
     */
    public function testIsIntRuleSuccess() {
        $data = array(
            "tinyInt" => 123,
        );

        $rules = array(
            "tinyInt" => "IsInt",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个整型
     */
    public function testUnsetIsIntRuleSuccess() {
        $data = array();

        $rules = array(
            "tinyInt" => "IsInt",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
