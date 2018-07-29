<?php
namespace Cloud\Validator\Rules;

/**
 * Description of MinValue
 *
 * @author cloud
 */
class MinValue extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('minValue');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return $val >= $args[0];
    }
}
