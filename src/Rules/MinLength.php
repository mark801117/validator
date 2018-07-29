<?php
namespace Cloud\Validator\Rules;

/**
 * Description of MinLength
 *
 * @author cloud
 */
class MinLength extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('minLength');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return mb_strlen($val, 'utf-8') >= $args[0];
    }
}
