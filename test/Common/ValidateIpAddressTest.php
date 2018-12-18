<?php

namespace Anax;

use PHPUnit\Framework\TestCase;
use Anax\Common\ValidateIpAddress;

/**
 * Example test class.
 */
class ValidateIpAddressTest extends TestCase
{
    protected function setUp()
    {
        $this->validator = new ValidateIpAddress();
    }

    public function testgetDomain()
    {
        $res = $this->validator->getDomain('1.1.1.1');

        $this->assertEquals($res, 'one.one.one.one');
    }

    public function testgetNoDomain()
    {
        $res = $this->validator->getDomain('gnot an ip, gnot gnobbling, a GNOOOOME');

        $this->assertFalse($res);
    }
}
