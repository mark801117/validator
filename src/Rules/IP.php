<?php
namespace Cloud\Validator\Rules;

/**
 * Description of IP
 *
 * @author cloud
 */
class IP extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('IP');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_IP);
    }
}