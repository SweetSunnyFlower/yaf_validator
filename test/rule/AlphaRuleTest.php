<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_AlphaRuleTest
 */
class Test_Gring_Validator_Rule_AlphaRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage alpha must be an alpha
     */
    public function testAlphaRule() {
        $data = array(
            "alpha" => "AbCd123",
        );

        $rules = array(
            'alpha' => "Alpha",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Alpha Rule rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage alpha must be an alpha
     */
    public function testAlphaRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "alpha" => "AbCd123",
                ),
            ),
        );

        $rules = array(
            'array.*.alpha' => "Alpha",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Alpha Rule rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母
     */
    public function testAlphaRuleSuccess() {
        $data = array(
            "alpha" => "AbCd",
        );

        $rules = array(
            'alpha' => "Alpha",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母
     */
    public function testUnsetAlphaRuleSuccess() {
        $data = array();

        $rules = array(
            'alpha' => "Alpha",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
