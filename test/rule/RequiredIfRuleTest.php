<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/9/30 6:46 下午
 * description :
 */

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_RequiredIfRuleTest
 */
class Test_Gring_Validator_Rule_RequiredIfRuleTest extends TestCase {
    /**
     * @desc 前置条件，参数必传验证
     * @expectedException Gring_Validator_Exception_Validator
     * @expectedExceptionMessage name must exist!
     */
    public function testRequiredIfRule() {
        $data = array(
            'type' => '1',
        );

        $rules = array(
            'name' => 'RequiredIf:type,1',
        );

        Gring_Validator_Factory::validate($data, $rules);
        $this->fail('Failed to assert RequiredIf Rule throw exception.');
    }

    /**
     * @desc 前置条件，参数必传验证
     */
    public function testRequiredIfRuleSuccess() {
        $data = array(
            'type' => '1',
            'name' => 'gaobingbing',
        );

        $rules = array(
            'name' => 'RequiredIf:type,1',
        );

        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, $data);
    }
}