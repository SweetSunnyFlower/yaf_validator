<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_UrlRuleTest
 */
class Test_Gring_Validator_Rule_UrlRuleTest extends TestCase {
    /**
     * @desc Url
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage url 格式错误
     */
    public function testUrlRule() {
        $data = array(
            'url' => 'http:://www.baidu.com.a',
        );

        $rules = array(
            'url' => 'Url',
        );

        $messages = array(
            'url.Url' => 'url 格式错误',
        );

        Gring_Validator_Factory::validate($data, $rules, $messages);
        $this->fail('Failed to assert Url Rule throw exception.');
    }

    /**
     * @desc Url
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage url 格式错误
     */
    public function testUrlRuleArray() {
        $data = array(
            "array" => array(
                array(
                    'url' => 'http:://www.baidu.com.a',
                ),
            ),
        );

        $rules = array(
            'array.*.url' => 'Url',
        );

        $messages = array(
            'array.*.url.Url' => 'url 格式错误',
        );

        Gring_Validator_Factory::validate($data, $rules, $messages);
        $this->fail('Failed to assert Url Rule throw exception.');
    }

    /**
     * @desc Url
     */
    public function testUrlRuleSuccess() {
        $data = array(
            'url' => 'http://www.baidu.com',
        );

        $rules = array(
            'url' => 'Url',
        );

        $messages = array(
            'url.Url' => 'url 格式错误',
        );

        $return = Gring_Validator_Factory::validate($data, $rules, $messages);
        $this->assertSame(
            $return,
            $data
        );
    }

    /**
     * @desc Url
     */
    public function testUnsetUrlRuleSuccess() {
        $data = array();

        $rules = array(
            'url' => 'Url',
        );

        $messages = array(
            'url.Url' => 'url 格式错误',
        );

        $return = Gring_Validator_Factory::validate($data, $rules, $messages);
        $this->assertSame($return, $data);
    }
}
