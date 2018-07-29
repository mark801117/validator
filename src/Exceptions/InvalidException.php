<?php
namespace Cloud\Validator\Exceptions;

/**
 * Description of InvalidException
 *
 * @author cloud
 */
class InvalidException extends \Exception
{
    protected $invalid_msgs;
    public function __construct(array $invalid_msgs, string $message = "", int $code = 0, \Throwable $previous = null) 
    {
        parent::__construct($message, $code, $previous);
        $this->invalid_msgs = $invalid_msgs;
    }
    public function getInvalidMsgs()
    {
        return $this->invalid_msgs;
    }
    public function pushInvalidMsg($id, $msg)
    {
        $this->invalid_msgs[$id] = $msg;
    }
}
