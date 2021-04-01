### ap框架扩展 --- validator
#### 使用说明
```php
$arrInput = array(
    'id' => '3',
    'name' => 'gaobingbing',
);
//注意：非必传参数，应该先校验参数类型，最后进行参数初始化
$rules = array(
    'id' => 'Required|IsInt|Range:1,2',
    'name' => 'Required|IsString',
    'age' => 'Default:Int', //age 是非必须参数，使用default 初始化,如果需要指定初始化值：'age' => 'Default:int,1'；
);
//messages 是可选参数，在rule中一般定义英文提示信息，如需汉语提示，在这里自定义 
$messages = array(
    'id.IsInt' => 'id 必须是整数',
    'name.IsString' => 'name 必须是字符串',
);
$arrInput = Validator_Factory::validate($arrInput, $rules, $messages);
/** 
$arrInput = array(
    'id' => '3',
    'name' => 'gaobingbing',
    'age' => 0, //经过default初始化
 );
**/
//$arrInput是过滤后的入参，可传入service_page使用
```
#### 其他规则参考如下：
#### **初始化**
**Default**
>非必传参数，做初始化
```php
//公司名称非必传，默认使用''，
$rule = array(
    'company' => 'Default:String',
);
//当传递北京度小满金融时，使用北京度小满金融时
$rule = array(
    'company' => 'Default:String,北京度小满金融',
);
```

#### **条件判断**
----
**AfterDate**
>验证参数值必须在某个日期之后
```php
$rule = array(
    'startTime' => 'AfterDate:2019-01-01 00:00:00',
);
```
----
**Alpha**
>验证参数值必须是大写字母 或 小写字母。
```php
$rule = array(
    'cityName' => 'Alpha',
);
```
----
**AlphaDash**
>验证参数值必须是 大写字母 、 小写字母、数字、短横 -、下划线 _。
```php
$rule = array(
    'userName' => 'AlphaDash',
);
```
----
**AlphaNum**
>验证参数值必须是 大写字母 、 小写字母、数字。
```php
$rule = array(
    'userName' => 'AlphaNum',
);
```
----
**BeforeDate**
>验证参数值必须在某个日期之前。
```php
$rule = array(
    'endTime' => 'BeforeDate:2019-01-01',
);
```
----
**Chs**
>验证参数值只能是 中文。
```php
$rule = array(
    'paragraph' => 'Chs',
);
```
----
**ChsAlpha**
>验证参数值必须是 中文、大写字母 、 小写字母。
```php
$rule = array(
    'paragraph' => 'ChsAlpha',
);
```
----
**ChsAlphaDash**
>验证参数值必须是 中文、大写字母 、 小写字母、数字、短横 -、下划线 _。
```php
$rule = array(
    'paragraph' => 'ChsAlphaDash',
);
```
----
**ChsAlphaNum**
>验证参数值必须是 中文、大写字母 、 小写字母、数字。
```php
$rule = array(
    'paragraph' => 'ChsAlphaNum',
);
```
----
**Confirm**
>验证参数值必须和另外一个字段参数值相同。
```php
$rule = array(
    'column1' => 'Confirm:column2',
);
```
----
**Different**
>验证参数值必须和另外一个字段参数值相同。
```php
$rule = array(
    'column1' => 'Different:column2',
);
```
----
**GreaterThan**
>验证参数值必须比另外一个字段参数值大，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
```php
$rule = array(
    'column1' => 'GreaterThan:column2',
);
```
----
**LessThan**
>验证参数值必须比另外一个字段参数值小，只支持 int 或 float, 字符串会被转化为 float 后进行对比。
```php
$rule = array(
    'column1' => 'LessThan:column2',
);
```
----
**Date**
>验证参数值必须是日期格式，支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
```php
$rule = array(
    'startTime' => 'Date',
);
```
----
**DateRange**
>验证参数值必须在某个日期范围之内（可以等于临界日期），支持 字符串时间戳、格式化日期字符串（只支持 Y-m-d H:i:s）、整型时间戳。
```php
$rule = array(
    'startTime' => 'DateRange:2019-01-01 00:00:00,2019-01-02 00:00:00',
);
```
----
**Dns**
>验证参数值必须是一个具有有效 DNS 记录域名或者ip，使用 checkdnsrr() 函数校验。
```php
$rule = array(
    'dns' => 'Dns',
);
```
----
**Email**
>验证参数值格式必须为邮箱。
```php
$rule = array(
    'email' => 'Email',
);
```
----
**Enum**
>验证参数值必须在枚举数组里面。
```php
$rule = array(
    'type' => 'Enum:1,2,3',
);
```
----
**Ip**
>验证参数值必须是个IP类型。
```php
$rule = array(
    'ip' => 'Ip',
);
```
----
**Length**
>验证参数值长度限制。
```php
$rule = array(
    'username' => 'Length:6,16',
);
```
----
**Low**
>验证参数值必须是小写字母。
```php
$rule = array(
    'username' => 'Low',
);
```
----
**Max**
>最大值验证，必须是整数。
```php
$rule = array(
    'amount' => 'Max:10000',
);
```
----
**Min**
>最小值验证，必须是整数。
```php
$rule = array(
    'amount' => 'Min:1',
);
```
----
**Mobile**
>手机号验证。
```php
$rule = array(
    'mobile' => 'Mobile',
);
```
----
**NotEmpty**
>参数值不能为空验证。
```php
$rule = array(
    'mobile' => 'NotEmpty',
);
```
----
**NotInEnum**
>验证参数值必须不在枚举数组中。
```php
$rule = array(
    'type' => 'NotInEnum:1,2,3',
);
```
----
**NotInRange**
>验证参数值必须不在范围内。
```php
$rule = array(
    'type' => 'NotInRange:1,9',
);
```
----
**Pattern**
>正则表达式验证。
```php
$rule = array(
    'username' => 'Pattern:/^1\d{10}$/',
);
```
----
**Range**
>参数值范围验证。
```php
$rule = array(
    'type' => 'Range:1,7',
);
```
----
**Required**
>参数必传验证。
```php
$rule = array(
    'name' => 'Required',
);
```
----
**RequiredIf**
>参数必传验证。
```php
//当type == 1时，name必传
$rule = array(
    'name' => 'RequiredIf:type,1',
);
```
----
**Upper**
>验证参数值必须是大写字母。
```php
$rule = array(
    'name' => 'Upper',
);
```
----
**Url**
>验证参数值必须是有效的URL格式，使用 filter_var()函数验证。
```php
$rule = array(
    'url' => 'Url',
);
```
----
#### **类型判断**
**IsArray**
>验证参数值必须是数组,使用 is_array()函数进行校验。
```php
$rule = array(
    'checkbox' => 'IsArray',
);
```
----
**IsBool**
>验证参数值必须是 bool 类型，注意字符串 true false，会验证成bool 类型,其余数据将会使用is_bool()`函数进行验证。
```php
$rule = array(
    'isSelect' => 'IsBool',
);
```
----
**IsFloat**
>验证参数值必须是浮点数,使用filter_var()函数进行验证。
```php
$rule = array(
    'amount' => 'IsFloat',
);
```
----
**IsInt**
>验证参数值必须是整数，使用filter_var()函数进行验证。
```php
$rule = array(
    'amount' => 'IsInt',
);
```
----
**IsString**
>验证参数值必须是字符串，使用is_string()函数进行验证。
```php
$rule = array(
    'amount' => 'IsString',
);
```
----
**二维数组**
```php
 $rules = array(
        'file' => "Required|IsArray|NotEmpty",
        'file.*.activityName' => "Required",
        'file.*.shopName' => "Required",
        'file.*.shopId' => "Required",
        'file.*.productId' => "Required|Enum:DXJ,YMD",
        'file.*.openExchange' => "Required",
        'file.*.activityRatio' => "Required",
        'file.*.activityStartTime' => "Required",
        'file.*.activityEndTime' => "Required",
        'file.*.shareRatio' => "Required",
    );
```
----
#### **自定义验证器**
>常见的业务默认验证器就能解决，但是有些业务默认验证器是没法验证，此时就需要用户根据自己业务需求，定义满足自己业务的验证器。

- 声明验证器很简单
   - 定一个类实现 `Gring_Validator_Contract_RuleInterface` 接口 
   - 实现 validate 方法，里面可以定义自己的业务验证器逻辑
   - 定义一个与之对应当map,此map继承 `Gring_Validator_Mapping_Base`,构造函数中获取条件