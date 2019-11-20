<?php
namespace Cloud\Validator\Rules;

/**
 * Description of DateISO
 *
 * @author cloud
 */
class DateISO extends AbstractRule
{
    public function __construct() 
    {
        parent::__construct('dateISO');
    }
    public function valid($val, $args)
    {
        $this->checkArgs($args, 0);
        return filter_var($val, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/'
            ]
        ]);
    }
}
