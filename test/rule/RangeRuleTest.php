<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_RangeRuleTest
 */
class Test_Gring_Validator_Rule_RangeRuleTest extends TestCase {
    /**
     * @desc 参数值范围验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is invalid range(min=1, max=7)
     */
    public function testRangeRule() {
        $data = array(
            'type' => '0.1',
        );

        $rules = array(
            'type' => 'Range:1,7',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Range Rule throw exception.');
    }

    /**
     * @desc 参数值范围验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is invalid range(min=1, max=7)
     */
    public function testRangeRuleArray() {
        $data = array(
            "array" => array(
                array(
                    'type' => '0.1',
                ),
            ),
        );

        $rules = array(
            'array.*.type' => 'Range:1,7',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Range Rule throw exception.');
    }

    /**
     * @desc 参数值范围验证
     */
    public function testRangeRuleSuccess() {
        $data = array(
            'type' => '2',
        );

        $rules = array(
            'type' => 'Range:1,7',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 参数值范围验证
     */
    public function testUnsetRangeRuleSuccess() {
        $data = array();

        $rules = array(
            'type' => 'Range:1,7',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
