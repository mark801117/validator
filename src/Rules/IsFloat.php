<?php
namespace Cloud\Validator\Rules;

/**
 * Description of IsFloat
 *
 * @author cloud
 */
class IsFloat extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('isFloat');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_FLOAT);
    }
}
