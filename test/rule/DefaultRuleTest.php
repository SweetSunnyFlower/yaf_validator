<?php
/**
 * author : v_gaobingbing@duxiaoman.com
 * createTime : 2020/10/9 10:48 上午
 * description :
 */

use PHPUnit\Framework\TestCase;

/**
 * class Test_Gring_Validator_Rule_DefaultRule
 */
class Test_Gring_Validator_Rule_DefaultRuleTest extends TestCase {
    /**
     * 默认值为空字符串
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultString() {
        $data = array();
        $rules = array(
            'name' => 'Default:String',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('name' => ''));
    }

    /**
     * 默认值为字符串值
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultStringValue() {
        $data = array();
        $rules = array(
            'name' => 'Default:String,高兵兵',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('name' => '高兵兵'));
    }

    /**
     * 默认值为Int
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultInt() {
        $data = array();
        $rules = array(
            'age' => 'Default:Int',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('age' => 0));
    }

    /**
     * 默认值为Int值
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultIntValue() {
        $data = array();
        $rules = array(
            'age' => 'Default:Int,29',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('age' => 29));
    }

    /**
     * 默认值为Float
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultFloat() {
        $data = array();
        $rules = array(
            'amount' => 'Default:Float',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('amount' => 0.00));
    }

    /**
     * 默认值为Float值
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultFloatValue() {
        $data = array();
        $rules = array(
            'amount' => 'Default:Float,10.00',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('amount' => 10.00));
    }

    /**
     * 默认值为Bool
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultBool() {
        $data = array();
        $rules = array(
            'isCheck' => 'Default:Bool',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('isCheck' => true));
    }

    /**
     * 默认值为Bool值
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultBoolValue() {
        $data = array();
        $rules = array(
            'isCheck' => 'Default:Bool,false',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('isCheck' => false));

        $data = array();
        $rules = array(
            'isCheck' => 'Default:Bool,true',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('isCheck' => true));
    }

    /**
     * 默认值为Array()
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultArray() {
        $data = array();
        $rules = array(
            'users' => 'Default:Array',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('users' => array()));
    }

    /**
     * 默认值为Null()
     * @throws Gring_Validator_Exception_Validator
     */
    public function testDefaultNull() {
        $data = array();
        $rules = array(
            'users' => 'Default:Null',
        );
        $return = Gring_Validator_Factory::validate($data, $rules);
        $this->assertSame($return, array('users' => null));
    }
}