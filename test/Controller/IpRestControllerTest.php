<?php

namespace Anax\IpController;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpRestControllerTest extends TestCase
{
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new IpRestController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    //Test indexActionGet
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();

        $exp = [[
            "error" => "Not found,",
            "helptext" => "try sending your ip over post instead",
        ], 404];

        $this->assertEquals($exp, $res);
    }

    //test indexActionPost
    public function testIndexActionPostSuccess()
    {
        $ipaddr = "1.1.1.1";
        $valid = true;
        $domain = "one.one.one.one";

        $_POST["ip"] = $ipaddr; //this is bad code and should be fixed
        $res = $this->controller->indexActionPost();

        $exp = [[
                    "ip" => $ipaddr,
                    "valid" => $valid,
                    "domain" => $domain,
                ]];

        $this->assertEquals($exp, $res);
    }
    public function testIndexActionPostFail()
    {
        $ipaddr = "not-an-ipaddr";
        $valid = false;
        $domain = "";

        $_POST["ip"] = $ipaddr; //this is bad code and should be fixed
        $res = $this->controller->indexActionPost();

        $exp = [[
                    "ip" => $ipaddr,
                    "valid" => $valid,
                    "domain" => $domain,
                ]];

        $this->assertEquals($exp, $res);
    }
}
