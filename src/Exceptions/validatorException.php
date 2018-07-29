<?php
namespace Cloud\Validator\Exceptions;

/**
 * Description of validatorException
 *
 * @author cloud
 */
class validatorException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
    }
}
