<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_NotEmptyRuleTest
 */
class Test_Gring_Validator_Rule_NotEmptyRuleTest extends TestCase {
    /**
     * @desc 校验参数非空
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage phone can not be empty!
     */
    public function testNotEmptyRule() {
        $data = array(
            "phone" => "",
        );

        $rules = array(
            "phone" => "NotEmpty",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert not empty Rule throw exception.');
    }

    /**
     * @desc 校验参数非空
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage phone can not be empty!
     */
    public function testNotEmptyRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "phone" => "",
                ),
            ),
        );

        $rules = array(
            "array.*.phone" => "NotEmpty",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert not empty Rule throw exception.');
    }

    /**
     * @desc 校验参数非空
     */
    public function testNotEmptyRuleSuccess() {
        $data = array(
            "phone" => "18335908792",
        );

        $rules = array(
            "phone" => "NotEmpty",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 校验参数非空
     */
    public function testUnsetNotEmptyRuleSuccess() {
        $data = array();

        $rules = array(
            "phone" => "NotEmpty",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
