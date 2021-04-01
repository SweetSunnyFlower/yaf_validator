<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_MinRuleTest
 */
class Test_Gring_Validator_Rule_MinRuleTest extends TestCase {
    /**
     * @desc 最小值验证，必须是整数
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage min is too small(min=101)
     */
    public function testMinRule() {
        $data = array(
            "min" => "100",
        );

        $rules = array(
            "min" => "Min:101",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Min Rule throw exception.');
    }

    /**
     * @desc 最小值验证，必须是整数
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage min is too small(min=101)
     */
    public function testMinRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "min" => "100",
                ),
            ),
        );

        $rules = array(
            "array.*.min" => "Min:101",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Min Rule throw exception.');
    }

    /**
     * @desc 最小值验证，必须是整数
     */
    public function testMinRuleSuccess() {
        $data = array(
            "min" => "102",
        );

        $rules = array(
            "min" => "Min:101",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 最小值验证，必须是整数
     */
    public function testUnsetMinRuleSuccess() {
        $data = array();

        $rules = array(
            "min" => "Min:101",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
