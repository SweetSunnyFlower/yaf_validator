<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_IpRuleTest
 */
class Test_Gring_Validator_Rule_IpRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage ip is invalid ip
     */
    public function testIpRule() {
        $data = array(
            "ip" => "www.baidu.com",
        );

        $rules = array(
            "ip" => "Ip",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Ip Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage ip is invalid ip
     */
    public function testIpRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "ip" => "www.baidu.com",
                ),
            ),
        );

        $rules = array(
            "array.*.ip" => "Ip",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Ip Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     */
    public function testIpRuleArraySuccess() {
        $data = array(
            "array" => array(
                array(
                    "ip" => "127.0.0.1",
                ),
            ),
        );

        $rules = array(
            "array.*.ip" => "Ip",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     */
    public function testIpRuleSuccess() {
        $data = array(
            "ip" => "118.24.108.196",
        );

        $rules = array(
            "ip" => "Ip",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     */
    public function testUnsetIpRuleSuccess() {
        $data = array();

        $rules = array(
            "ip" => "Ip",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
