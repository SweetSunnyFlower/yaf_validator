<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_ChsRuleTest
 */
class Test_Gring_Validator_Rule_ChsRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是 中文
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs must be Chinese characters
     */
    public function testChsRule() {
        $data = array(
            "chs" => "中文chinese",
        );

        $rules = array(
            'chs' => "Chs",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage chs must be Chinese characters
     */
    public function testChsRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "chs" => "中文chinese",
                ),
            ),
        );

        $rules = array(
            'array.*.chs' => "Chs",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Chs Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是 中文
     */
    public function testChsRuleSuccess() {
        $data = array(
            "chs" => "中文",
        );

        $rules = array(
            'chs' => "Chs",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是 中文
     */
    public function testUnsetChsRuleSuccess() {
        $data = array();

        $rules = array(
            'chs' => "Chs",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

}
