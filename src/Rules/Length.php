<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Length
 *
 * @author cloud
 */
class Length extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('length');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 2);
        return mb_strlen($val, 'utf-8') >= $args[0] && mb_strlen($val, 'utf-8') <= $args[1];
    }
}
