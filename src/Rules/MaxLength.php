<?php
namespace Cloud\Validator\Rules;

/**
 * Description of MaxLength
 *
 * @author cloud
 */
class MaxLength extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('maxLength');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return mb_strlen($val, 'utf-8') <= $args[0];
    }
}
