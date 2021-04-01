<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_DateRangeRuleTest
 */
class Test_Gring_Validator_Rule_DateRangeRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage time is invalid  date range(start=2020-01-01 00:00:00, end=2021-01-01 00:00:00)
     */
    public function testDateRangeRule() {
        $between = array(
            '2020-01-01 00:00:00',
            '2021-01-01 00:00:00',
        );
        $data = array(
            "time" => "2022-01-01 00:00:00",
        );

        $rules = array(
            "time" => "DateRange:{$between[0]},{$between[1]}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Date Range Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
     */
    public function testDateRangeRuleSuccess() {
        $between = array(
            '2020-01-01 00:00:00',
            '2021-01-01 00:00:00',
        );
        $data = array(
            "time" => "2020-02-01 00:00:00",
        );

        $rules = array(
            "time" => "DateRange:{$between[0]},{$between[1]}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
     */
    public function testUnsetDateRangeRuleSuccess() {
        $between = array(
            '2020-01-01 00:00:00',
            '2021-01-01 00:00:00',
        );
        $data = array();

        $rules = array(
            "time" => "DateRange:{$between[0]},{$between[1]}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
     */
    public function testDateRangeRuleIntSuccess() {
        $between = array(
            1577808000,
            1609430400,
        );
        $data = array(
            "time" => 1580486400,
        );

        $rules = array(
            "time" => "DateRange:{$between[0]},{$between[1]}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
     */
    public function testDateRangeRuleIntStringSuccess() {
        $between = array(
            "1577808000",
            "1609430400",
        );
        $data = array(
            "time" => "1580486400",
        );

        $rules = array(
            "time" => "DateRange:{$between[0]},{$between[1]}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
