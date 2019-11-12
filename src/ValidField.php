<?php
namespace Cloud\Validator;

use Cloud\Validator\Exceptions\RuleException;

/**
 * Description of ValidRules
 *
 * @author cloud
 * @method ValidField length(int $min_len, int $max_len) 
 * @method ValidField email() 
 * @method ValidField isInt() 
 * @method ValidField isFloat() 
 * @method ValidField isUrl() 
 * @method ValidField IP() 
 * @method ValidField dateISO()
 * @method ValidField maxLength(int $max_len)
 * @method ValidField minLength(int $min_len)
 * @method ValidField maxValue(int $max_value)
 * @method ValidField minValue(int $min_value)
 * @method ValidField range(int $min_value, int $max_value)
 * @method ValidField equal(mixed $compare)
 * @method ValidField regex(string $regx)
 * @method ValidField custom(callable $func) parameter also can be bool(true / false)
 */
class ValidField
{
    protected $rules = [];
    protected $id;
    protected $name;
    protected $val;
    public $required = false;
    
    public function __construct($id, $name, $val, $required = false) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->val = $val;
        $this->required = $required;
        if ($required) {
            $this->__call('required', []);
        }
    }
    
    /**
     * 呼叫提供的驗證方法
     * @param string $name
     * @param [type] $arguments
     */
    public function __call($name, $arguments) 
    {
        $this->ruleUsed($name);
        $this->rules[$name] = [
            'name' => $name,
            'args' => $arguments,
            'message' => NULL
        ];
        return $this;
    }
    
    /**
     * 自行設定驗證的錯誤訊息
     * @param string $rule_name Equal to ValidField method example: length, isInt
     * @param string $message The message about invalid.
     * @throws RuleException
     */
    public function setRuleMessage($rule_name, $message)
    {
        $this->ruleExist($rule_name);
        $this->rules[$rule_name]['message'] = $message;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getVal()
    {
        return $this->val;
    }
    
    /**
     * 
     * @return array [$rule_name] => [ 'rule' => $rule_name, 'args' => array(), 'message' => msg(default: NULL) ]
     */
    public function getRules()
    {
        return $this->rules;
    }
    
    /**
     * rule can't be duplicated
     * @param string $rule_name
     * @throws RuleException
     */
    private function ruleUsed($rule_name)
    {
        if (isset($this->rules[$rule_name])) {
            throw new RuleException(sprintf("Rule \"%s\" was seted", $rule_name));
        }
    }
    
    /**
     * rule must be used before this step
     * @param string $rule_name
     * @throws RuleException
     */
    private function ruleExist($rule_name)
    {
        if (!isset($this->rules[$rule_name])) {
            throw new RuleException(sprintf("Rule \"%s\" was not found", $rule_name));
        }
    }
}
