<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_BeforeDateRuleTest
 */
class Test_Gring_Validator_Rule_BeforeDateRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须在某个日期之前
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage start_time must be before 2019-01-01 00:00:00
     */
    public function testBeforeDateRule() {
        $data = array(
            "start_time" => "2020-01-01 00:00:00",
            "end_time" => "2019-01-01 00:00:00",
        );

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert before date rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage start_time must be before 1546272000
     */
    public function testBeforeDateRuleInt() {
        $data = array(
            "start_time" => 1577808000,
            "end_time" => 1546272000,
        );

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert before date rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage start_time must be before 1546272000
     */
    public function testBeforeDateRuleString() {
        $data = array(
            "start_time" => "1577808000",
            "end_time" => "1546272000",
        );

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert before date rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage start_time must be before 2019-01-01 00:00:00
     */
    public function testBeforeDateRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "start_time" => "2020-01-01 00:00:00",
                    "end_time" => "2019-01-01 00:00:00",
                ),
            ),
        );

        $rules = array(
            'array.*.start_time' => "BeforeDate:end_time",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert before date rule throw exception.');
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     */
    public function testBeforeDateRuleSuccess() {
        $data = array(
            "start_time" => "2020-01-01 00:00:00",
            "end_time" => "2021-01-01 00:00:00",
        );

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     */
    public function testBeforeDateRuleIntSuccess() {
        $data = array(
            "start_time" => 1577808000,
            "end_time" => 1577808001,
        );

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须在某个日期之前
     */
    public function testUnsetBeforeDateRuleSuccess() {
        $data = array();

        $rules = array(
            'start_time' => "BeforeDate:{$data['end_time']}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
