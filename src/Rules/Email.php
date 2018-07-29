<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Email
 *
 * @author cloud
 */
class Email extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('email');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
}
