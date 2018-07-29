<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Range
 *
 * @author cloud
 */
class Range extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('range');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 2);
        return $val >= $args[0] && $val <= $args[1];
    }
}