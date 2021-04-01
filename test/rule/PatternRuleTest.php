<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_PatternRuleTest
 */
class Test_Gring_Validator_Rule_PatternRuleTest extends TestCase {
    /**
     * @desc 正则表达式验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage username is invalid pattern!
     */
    public function testPatternRule() {
        $data = array(
            'username' => '2aaaaaa',
        );

        $rules = array(
            "username" => "Pattern:/^1\d{10}$/",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert pattern Rule throw exception.');
    }

    /**
     * @desc 正则表达式验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage username is invalid pattern!
     */
    public function testPatternRuleArray() {
        $data = array(
            'array' => array(
                array(
                    'username' => '2aaaaaa',
                ),
            ),
        );

        $rules = array(
            "array.*.username" => "Pattern:/^1\d{10}$/",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert pattern Rule throw exception.');
    }

    /**
     * @desc 正则表达式验证
     */
    public function testPatternRuleSuccess() {
        $data = array(
            'username' => '13653525327',
        );

        $rules = array(
            "username" => "Pattern:/^1\d{10}$/",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 正则表达式验证
     */
    public function testUnsetPatternRuleSuccess() {
        $data = array();

        $rules = array(
            "username" => "Pattern:/^1\d{10}$/",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
