<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_UpperRuleTest
 */
class Test_Gring_Validator_Rule_UpperRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是大写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage upperName must be uppercase alpha
     */
    public function testUpperRule() {
        $data = array(
            "upperName" => "Peter",
        );

        $rules = array(
            "upperName" => "Upper",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Upper Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是大写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage upperName must be uppercase alpha
     */
    public function testUpperRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "upperName" => "Peter",
                ),
            ),
        );

        $rules = array(
            "array.*.upperName" => "Upper",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Upper Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是大写字母
     */
    public function testUpperRuleSuccess() {
        $data = array(
            "upperName" => "ETC",
        );

        $rules = array(
            "upperName" => "Upper",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是大写字母
     */
    public function testUnsetUpperRuleSuccess() {
        $data = array();

        $rules = array(
            "upperName" => "Upper",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
