<?php

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_DnsRuleTest
 */
class Test_Gring_Validator_Rule_DnsRuleTest extends TestCase {
    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage dns invalid dns
     */
    public function testDnsRule() {
        $data = array(
            "dns" => "118.24.108.196",
        );

        $rules = array(
            "dns" => "Dns",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Dns Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage dns invalid dns
     */
    public function testDnsRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "dns" => "118.24.108.196",
                ),
            ),
        );

        $rules = array(
            "array.*.dns" => "Dns",
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert Dns Rule throw exception.');
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     */
    public function testDnsRuleSuccess() {
        $data = array(
            "dns" => "www.baidu.com",
        );

        $rules = array(
            "dns" => "Dns",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }

    /**
     * @desc 验证参数值必须是一个具有有效 DNS 记录域名或者ip
     */
    public function testUnsetDnsRuleSuccess() {
        $data = array();

        $rules = array(
            "dns" => "Dns",
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}
