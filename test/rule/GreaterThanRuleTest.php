<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_GreaterThanRuleTest
 */
class Test_Gring_Validator_Rule_GreaterThanRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须比另外一个字段参数值大，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be greater than columnA field
     */
    public function testGreaterThanRule() {
        $data = array(
            "columnA" => 100,
            "columnB" => 100,
        );

        $rules = array(
            "columnB" => "GreaterThan:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Greater Than Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值大，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be greater than columnA field
     */
    public function testGreaterThanRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "columnA" => 100,
                    "columnB" => 100,
                ),
            ),
        );

        $rules = array(
            "array.*.columnB" => "GreaterThan:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Greater Than Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值大，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
     */
    public function testGreaterThanRuleSuccess() {
        $data = array(
            "columnA" => 100,
            "columnB" => 101,
        );

        $rules = array(
            "columnB" => "GreaterThan:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值大，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
     */
    public function testUnsetGreaterThanRuleSuccess() {
        $data = array();

        $rules = array(
            "columnB" => "GreaterThan:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
