<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_DateRuleTest
 */
class Test_Gring_Validator_Rule_DateRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage time must date!
     */
    public function testIntDateRule() {
        $intTime = array(
            "time" => "a1234567",
        );

        $rules = array(
            "time" => "Date",
        );

        Gring_Validator_Factory::validate($intTime, $rules);

        $this->fail('Failed to assert Date Rule throw exception.');
    }


    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage time must date!
     */
    public function testStringDateRule() {
        $strTime = array(
            "time" => "2020-01-01 00:01:00 1",
        );

        $rules = array(
            "time" => "Date",
        );

        Gring_Validator_Factory::validate($strTime, $rules);
        $this->fail('Failed to assert Date Rule type of string throw exception.');
    }


    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage time must date!
     */
    public function testStringDateRuleArray() {
        $strTime = array(
            "array" => array(
                array(
                    "time" => "2020-01-01 00:01:00 1",
                ),
            ),
        );

        $rules = array(
            "array.*.time" => "Date",
        );

        Gring_Validator_Factory::validate($strTime, $rules);
        $this->fail('Failed to assert Date Rule type of string throw exception.');
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testStringDateRuleSuccess() {
        $intTime = array(
            "time" => "2020-01-01 00:00:00",
        );

        $rules = array(
            "time" => "Date",
        );

        $return = Gring_Validator_Factory::validate($intTime, $rules);
        $this->assertSame($return, $intTime);
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testStringIntDateRuleSuccess() {
        $intTime = array(
            "time" => "1610973133",
        );

        $rules = array(
            "time" => "Date",
        );

        $return = Gring_Validator_Factory::validate($intTime, $rules);
        $this->assertSame($return, $intTime);
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testIntDateRuleSuccess() {
        $IntTime = array(
            "time" => 1546272000,
        );

        $rules = array(
            "time" => "Date",
        );

        $return = Gring_Validator_Factory::validate($IntTime, $rules);
        $this->assertSame($return, $IntTime);
    }

    /**
     * @desc 验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳
     */
    public function testEmptyDateRuleSuccess() {
        $time = array();

        $rules = array(
            "time" => "Date",
        );

        $return = Gring_Validator_Factory::validate($time, $rules);
        $this->assertSame($return, $time);
    }
}
