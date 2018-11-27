<?php

namespace Anax\IpController;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpGeoRestControllerTest extends TestCase
{

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpGeoRestController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $exp = [[
            "error" => "No domain specified",
            "helptext" => "try geoapi/ip/:yourIP",
        ], 200];

        $this->assertEquals($exp, $res);
    }

    public function testIpActionGetSucess()
    {
        $res = $this->controller->ipActionGet("1.1.1.1");
        $exp = "1.1.1.1";
        $this->assertEquals($exp, $res[0]["ip"]);
    }

    public function testIpActionGetFailure()
    {
        $res = $this->controller->ipActionGet("999.999.999.999");
        $exp = "invalid";
        $this->assertEquals($exp, $res[0]["valid"]);
    }
}
