<?php
namespace Cloud\Validator\Rules;

/**
 * Description of Regex
 *
 * @author cloud
 */
class Regex extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('regex');
    }
    
    public function valid($val, $args)
    {
        $this->checkArgs($args, 1);
        return filter_var($val, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => $args[0]
            ]
        ]);
    }
}
