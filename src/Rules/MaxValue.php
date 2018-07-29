<?php
namespace Cloud\Validator\Rules;

/**
 * Description of MaxValue
 *
 * @author cloud
 */
class MaxValue extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('maxValue');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return $val <= $args[0];
    }
}
