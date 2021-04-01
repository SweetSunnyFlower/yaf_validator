<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_NotInRangeRuleTest
 */
class Test_Gring_Validator_Rule_NotInRangeRuleTest extends TestCase {
    /**
     * @desc !参数值范围验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is exists in range(min=1, max=7)
     */
    public function testNotInRangeRule() {
        $data = array(
            'type' => '2',
        );

        $rules = array(
            'type' => 'NotInRange:1,7',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Not In Range Rule throw exception.');
    }

    /**
     * @desc !参数值范围验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage type is exists in range(min=1, max=7)
     */
    public function testNotInRangeRuleArray() {
        $data = array(
            'array' => array(
                array(
                    'type' => '2',
                ),
            ),
        );

        $rules = array(
            'array.*.type' => 'NotInRange:1,7',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Not In Range Rule throw exception.');
    }

    /**
     * @desc !参数值范围验证
     */
    public function testNotInRangeRuleSuccess() {
        $data = array(
            'type' => '8',
        );

        $rules = array(
            'type' => 'NotInRange:1,7',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc !参数值范围验证
     */
    public function testUnsetNotInRangeRuleSuccess() {
        $data = array();

        $rules = array(
            'type' => 'NotInRange:1,7',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
