<?php
namespace Cloud\Validator\Rules;

/**
 * Description of isUrl
 *
 * @author cloud
 */
class isUrl extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('isUrl');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_URL);
    }
}
