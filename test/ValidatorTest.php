<?php
namespace Cloud\Validator\Test;

use PHPUnit\Framework\TestCase;
use Cloud\Validator\Validator;
/**
 * Description of ValidatorTest
 *
 * @author cloud
 */
class ValidatorTest extends TestCase
{
    public function testValidator()
    {
        $v=new Validator();
        $v->rule('name', '名稱', '王建民', true)->maxLength(4);
        $result = $v->valid();
        $this->assertEquals(true, $result);
    }
}
