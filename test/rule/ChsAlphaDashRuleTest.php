<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_ChsAlphaDashRuleTest
 */
class Test_Gring_Validator_Rule_ChsAlphaDashRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字、短横 -、下划线 _
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha_dash must be Chinese characters  alpha number or dash
     */
    public function testChsAlphaDashRule() {
        $data = array(
            "chs_alpha_dash" => "中文Ab1-_|",
        );

        $rules = array(
            'chs_alpha_dash' => "ChsAlphaDash",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Alpha Dash rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字、短横 -、下划线 _
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha_dash must be Chinese characters  alpha number or dash
     */
    public function testChsAlphaDashRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "chs_alpha_dash" => "中文Ab1-_|",
                ),
            ),
        );

        $rules = array(
            'array.*.chs_alpha_dash' => "ChsAlphaDash",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字、短横 -、下划线 _
     */
    public function testChsAlphaDashRuleSuccess() {
        $data = array(
            "chs_alpha_dash" => "中文Ab1-_",
        );

        $rules = array(
            'chs_alpha_dash' => "ChsAlphaDash",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母、数字、短横 -、下划线 _
     */
    public function testUnsetChsAlphaDashRuleSuccess() {
        $data = array();

        $rules = array(
            'chs_alpha_dash' => "ChsAlphaDash",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
