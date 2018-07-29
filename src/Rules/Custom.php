<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Custom
 *
 * @author cloud
 */
class Custom extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('custom');
    }
    
    public function valid($val, $args)
    {
        $func = $args[0];
        if (!is_callable($func)) {
            throw new \Cloud\Validator\Exceptions\RuleException(sprintf("'%s' rule require a function", $this->name));
        }
        return $func();
    }
}