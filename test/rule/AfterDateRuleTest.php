<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_AfterDateRule
 */
class Test_Gring_Validator_Rule_AfterDateRuleTest extends TestCase {

    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 2020-01-01 00:00:00
     */
    public function testAfterDateRule() {
        $data = array(
            "start_time" => "2020-01-01 00:00:00",
            "end_time" => "2019-01-01 00:00:00",
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }

    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 1577808000
     */
    public function testAfterDateRuleInt() {
        $data = array(
            "start_time" => 1577808000,
            "end_time" => 1546272000,
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }

    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 1577808000
     */
    public function testAfterDateRuleString() {
        $data = array(
            "start_time" => "1577808000",
            "end_time" => "1546272000",
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }

    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 2020-01-01 00:00:00
     */
    public function testAfterDateRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "start_time" => "2020-01-01 00:00:00",
                    "end_time" => "2019-01-01 00:00:00",
                ),
            ),
        );

        $rules = array(
            'array.*.end_time' => "AfterDate:start_time",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }

    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 1610969194
     */
    public function testAfterDateIntRule() {
        $data = array(
            "start_time" => 1610969194,
            "end_time" => 1610869194,
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }


    /**
     * @desc 验证时间A必须在时间B之后
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage end_time must be after 1610969194
     */
    public function testAfterDateIntRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "start_time" => 1610969194,
                    "end_time" => 1610869194,
                ),
                array(
                    "start_time" => 1610969194,
                    "end_time" => 1611069194,
                ),
            ),
        );

        $rules = array(
            'array.*.end_time' => "AfterDate:start_time",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert after date rule throw exception.');
    }

    /**
     * @desc 验证时间A必须在时间B之后
     */
    public function testAfterDateRuleSuccess() {
        $data = array(
            "start_time" => "2020-01-01 00:00:00",
            "end_time" => "2021-01-01 00:00:00",
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证时间A必须在时间B之后
     */
    public function testIntAfterDateRuleSuccess() {
        $data = array(
            "start_time" => 1610969194,
            "end_time" => 16109691945,
        );

        $rules = array(
            'end_time' => "AfterDate:{$data['start_time']}",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证时间A必须在时间B之后
     */
    public function testEmptyAfterDateRuleSuccess() {
        $data = array();

        $rules = array(
            'end_time' => "AfterDate",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
