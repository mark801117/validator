<?php
namespace Cloud\Validator\Rules;

use Cloud\Validator\Exceptions\RuleException;
/**
 * Description of AbstractRule
 *
 * @author cloud
 */
abstract class AbstractRule 
{
    protected $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    /**
     * 檢查驗證參數
     * @param type $args 驗證參數
     * @throws RuleException
     */
    protected function checkArgs(array $args, int $max)
    {
        if (count($args) !== $max) {
            throw new RuleException(sprintf("'%s' rule require %s parameters", $this->name, $max));
        }
    }
    /**
     * 驗證方法
     */
    abstract public function valid($val, array $args);
}
