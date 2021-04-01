<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_MaxRuleTest
 */
class Test_Gring_Validator_Rule_MaxRuleTest extends TestCase {
    /**
     * @desc 最大值验证，必须是整数
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage max is too big(max=10)
     */
    public function testMaxRule() {
        $data = array(
            "max" => "100",
        );

        $rules = array(
            "max" => "Max:10",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Max Rule throw exception.');
    }

    /**
     * @desc 最大值验证，必须是整数
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage max is too big(max=10)
     */
    public function testMaxRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "max" => "100",
                ),
            ),
        );

        $rules = array(
            "array.*.max" => "Max:10",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Max Rule throw exception.');
    }

    /**
     * @desc 最大值验证，必须是整数
     */
    public function testMaxRuleSuccess() {
        $data = array(
            "max" => "9",
        );

        $rules = array(
            "max" => "Max:10",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 最大值验证，必须是整数
     */
    public function testUnsetMaxRuleSuccess() {
        $data = array();

        $rules = array(
            "max" => "Max:10",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
