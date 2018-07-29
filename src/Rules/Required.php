<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Required
 *
 * @author cloud
 */
class Required extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('required');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return !empty($val);
    }
}
