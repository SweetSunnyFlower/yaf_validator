<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_AlphaDashRuleTest
 */
class Test_Gring_Validator_Rule_AlphaDashRuleTest extends TestCase {

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字、短横 -、or 下划线 _
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage alpha_dash must be an alpha , number or dash
     */
    public function testAlphaDashRule() {
        $data = array(
            "alpha_dash" => "alpha|dash",
        );

        $rules = array(
            'alpha_dash' => "AlphaDash",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Alpha Dash Rule rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字、短横 -、or 下划线 _
     */
    public function testAlphaDashRuleSuccess() {
        $data = array(
            "alpha_dash" => "alpha_dash",
        );

        $rules = array(
            'alpha_dash' => "AlphaDash",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($data, $return);
    }

    /**
     * @desc 验证参数值必须是 大写字母 、 小写字母、数字、短横 -、or 下划线 _
     */
    public function testEmptyAlphaDashRuleSuccess() {
        $data = array();

        $rules = array(
            'alpha_dash' => "AlphaDash",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($data, $return);
    }
}
