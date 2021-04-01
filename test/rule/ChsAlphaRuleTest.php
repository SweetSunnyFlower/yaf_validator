<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_ChsAlphaRule
 */
class Test_Gring_Validator_Rule_ChsAlphaRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha must be Chinese characters or alpha
     */
    public function testChsAlphaRule() {
        $data = array(
            "chs_alpha" => "中文Ab1",
        );

        $rules = array(
            'chs_alpha' => "ChsAlpha",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Alpha Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs_alpha must be Chinese characters or alpha
     */
    public function testChsAlphaRuleArray() {
        $data = array(
            'array' => array(
                array(
                    "chs_alpha" => "中文Ab1",
                ),
            ),
        );

        $rules = array(
            'array.*.chs_alpha' => "ChsAlpha",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Alpha Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母
     */
    public function testChsAlphaRuleSuccess() {
        $data = array(
            "chs_alpha" => "中文Ab",
        );

        $rules = array(
            'chs_alpha' => "ChsAlpha",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 中文、大写字母 、 小写字母
     */
    public function testUnsetChsAlphaRuleSuccess() {
        $data = array();

        $rules = array(
            'chs_alpha' => "ChsAlpha",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
