<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_DifferentRuleTest
 */
class Test_Gring_Validator_Rule_DifferentRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnA must be different columnB field
     */
    public function testDifferentRule() {
        $data = array(
            "columnA" => "columnAValue",
            "columnB" => "columnAValue",
        );

        $rules = array(
            "columnA" => "Different:columnB",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Different Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnA must be different columnB field
     */
    public function testDifferentRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "columnA" => "columnAValue",
                    "columnB" => "columnAValue",
                ),
            ),
        );

        $rules = array(
            "array.*.columnA" => "Different:columnB",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Different Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testDifferentRuleSuccess() {
        $data = array(
            "columnA" => "columnAValue",
            "columnB" => "columnBValue",
        );

        $rules = array(
            "columnA" => "Different:columnB",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testUnsetDifferentRuleSuccess() {
        $data = array();

        $rules = array(
            "columnA" => "Different:columnB",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
