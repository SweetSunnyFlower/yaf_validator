<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 6:46 下午
 * description :
 */

use PHPUnit\Framework\TestCase;

class Test_Gring_Validator_Rule_RequiredRuleTest extends TestCase {
    /**
     * @desc 验证参数必填
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage id must exist!
     */
    public function testRequiredRule() {
        $data = array(
            "name" => "v_gaobingbing_dxm",
        );

        $rules = array(
            'id' => 'Required',
            'name' => 'Required',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert required rule throw exception with id must exist!.');
    }

    /**
     * @desc 验证参数必填
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage id must exist!
     */
    public function testRequiredRuleArray() {
        $data = array(
            "array" => array(
                array(
                    "name" => "v_gaobingbing_dxm",
                ),
                array(
                    "id" => 1,
                    "name" => "v_gaobingbing_dxm",
                ),
            ),
        );

        $rules = array(
            'array.*.id' => 'Required',
            'array.*.name' => 'Required',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert required rule throw exception with id must exist!.');
    }

    /**
     * @desc 验证参数必填
     */
    public function testRequiredRuleSuccess() {
        $data = array(
            "id" => 1,
            "name" => "v_gaobingbing_dxm",
        );

        $rules = array(
            'id' => 'Required',
            'name' => 'Required',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}