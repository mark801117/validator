<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Equal
 *
 * @author cloud
 */
class Equal extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('equal');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return $val == $args[0];
    }
}
