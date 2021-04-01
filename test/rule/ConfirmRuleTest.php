<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_ConfirmRuleTest
 */
class Test_Gring_Validator_Rule_ConfirmRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须和另外一个字段参数值相同
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be equal columnA field
     */
    public function testConfirmRule() {
        $data = array(
            "columnA" => "columnAValue",
            "columnB" => "columnBValue",
        );

        $rules = array(
            'columnB' => "Confirm:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Confirm Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须和另外一个字段参数值相同
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage columnB must be equal columnA field
     */
    public function testConfirmRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "columnA" => "columnAValue",
                    "columnB" => "columnBValue",
                ),
            ),
        );

        $rules = array(
            'array.*.columnB' => "Confirm:columnA",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Confirm Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须和另外一个字段参数值相同
     */
    public function testConfirmRuleSuccess() {
        $data = array(
            "columnA" => "columnBValue",
            "columnB" => "columnBValue",
        );

        $rules = array(
            'columnB' => "Confirm:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }


    /**
     * @desc 验证参数值必须和另外一个字段参数值相同
     */
    public function testUnsetConfirmRuleSuccess() {
        $data = array();

        $rules = array(
            'columnB' => "Confirm:columnA",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
