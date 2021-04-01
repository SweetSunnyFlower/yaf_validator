<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_MobileRuleTest
 */
class Test_Gring_Validator_Rule_MobileRuleTest extends TestCase {
    /**
     * @desc 手机号验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage phone is invalid mobile!
     */
    public function testMobileRule() {
        $data = array(
            "phone" => "1833590872",
        );

        $rules = array(
            "phone" => "Mobile",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert mobile Rule throw exception.');
    }

    /**
     * @desc 手机号验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage phone is invalid mobile!
     */
    public function testMobileRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "phone" => "1833590872",
                ),
            ),
        );

        $rules = array(
            "array.*.phone" => "Mobile",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert mobile Rule throw exception.');
    }

    /**
     * @desc 手机号验证
     */
    public function testMobileRuleSuccess() {
        $data = array(
            "phone" => "18335908729",
        );

        $rules = array(
            "phone" => "Mobile",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 手机号验证
     */
    public function testUnsetMobileRuleSuccess() {
        $data = array();

        $rules = array(
            "phone" => "Mobile",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
