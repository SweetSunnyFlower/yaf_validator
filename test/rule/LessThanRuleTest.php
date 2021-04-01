<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_LessThanRuleTest
 */
class Test_Gring_Validator_Rule_LessThanRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须比另外一个字段参数值小，只支持 int 或 float, 字符串会被转化为 float 后进行对比
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be less than columnA field
     */
    public function testLessThanRule() {
        $data = array(
            "columnA" => "100",
            "columnB" => "101",
        );

        $rules = array(
            "columnB" => "LessThan:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert LessThan Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值小，只支持 int 或 float, 字符串会被转化为 float 后进行对比
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be less than columnA field
     */
    public function testLessThanRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "columnA" => "100",
                    "columnB" => "101",
                ),
            ),
        );

        $rules = array(
            "array.*.columnB" => "LessThan:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert LessThan Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值小，只支持 int 或 float, 字符串会被转化为 float 后进行对比
     */
    public function testLessThanRuleSuccess() {
        $data = array(
            "columnA" => "100",
            "columnB" => "99",
        );

        $rules = array(
            "columnB" => "LessThan:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须比另外一个字段参数值小，只支持 int 或 float, 字符串会被转化为 float 后进行对比
     */
    public function testUnsetLessThanRuleSuccess() {
        $data = array();

        $rules = array(
            "columnB" => "LessThan:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
