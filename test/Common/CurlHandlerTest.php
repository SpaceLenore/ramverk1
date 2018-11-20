<?php

namespace Anax;

use PHPUnit\Framework\TestCase;
use Anax\Common\CurlHandler;

/**
 * Example test class.
 */
class CurlHandlerTest extends TestCase
{
    protected function setUp()
    {
        $this->curlHandler = new CurlHandler();
    }

    public function testBasicCurlResponse()
    {
        $res = $this->curlHandler->BasicCurl("http://www.student.bth.se/~vite17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/");
        $exp = "Ramverket för Ramverk 1";
        $this->assertContains($exp, $res);
    }

    public function testBasicCurlFailure()
    {
        $res = $this->curlHandler->BasicCurl(NULL);

        $this->assertFalse($res);
    }

    public function testJsonCurlResponse()
    {
        $res = $this->curlHandler->JsonCurl("http://www.student.bth.se/~vite17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/ip-api");
        $exp = [
            "error" => "Not found,",
            "helptext" => "try sending your ip over post instead"
        ];
        $this->assertEquals($exp, $res);
    }

    public function testJsonCurlFailure()
    {
        $res = $this->curlHandler->JsonCurl(NULL);

        $this->assertFalse($res);
    }
}
