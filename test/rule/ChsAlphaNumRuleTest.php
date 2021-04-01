<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_ChsAlphaNumRuleTest
 */
class Test_Gring_Validator_Rule_ChsAlphaNumRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha_num must be Chinese characters  alpha or number
     */
    public function testChsAlphaNumRule() {
        $data = array(
            "chs_alpha_num" => "中文Ab1_",
        );

        $rules = array(
            'chs_alpha_num' => "ChsAlphaNum",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Alpha Num Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha_num must be Chinese characters  alpha or number
     */
    public function testChsAlphaNumRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "chs_alpha_num" => "中文Ab1_",
                ),
            ),
        );

        $rules = array(
            'array.*.chs_alpha_num' => "ChsAlphaNum",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Alpha Num Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字
     */
    public function testChsAlphaNumRuleSuccess() {
        $data = array(
            "chs_alpha_num" => "中文Ab1",
        );

        $rules = array(
            'chs_alpha_num' => "ChsAlphaNum",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字
     */
    public function testUnsetChsAlphaNumRuleSuccess() {
        $data = array();

        $rules = array(
            'chs_alpha_num' => "ChsAlphaNum",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
