<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_AlphaNumRuleTest
 */
class Test_Gring_Validator_Rule_AlphaNumRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage alpha_num must be an alpha or number
     */
    public function testAlphaNumRule() {
        $data = array(
            "alpha_num" => "1234567n_",
        );

        $rules = array(
            'alpha_num' => "AlphaNum",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Alpha Num Rule rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字
     */
    public function testAlphaNumRuleSuccess() {
        $data = array(
            "alpha_num" => "1234567n",
        );

        $rules = array(
            'alpha_num' => "AlphaNum",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字
     */
    public function testEmptyAlphaNumRuleSuccess() {
        $data = array();

        $rules = array(
            'alpha_num' => "AlphaNum",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
