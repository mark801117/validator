<?php
namespace Cloud\Validator\Rules;

/**
 * Description of IsInt
 *
 * @author cloud
 */
class IsInt extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('isInt');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_INT);
    }
}
