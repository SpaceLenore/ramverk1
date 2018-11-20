<?php

namespace Anax\IpController;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpGeoWebControllerTest extends TestCase
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
        $this->controller = new IpGeoWebController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    public function testIndexActionGet()
    {
        $_SERVER['REMOTE_ADDR'] = "1.1.1.1";
        $res = $this->controller->indexAction();
        $body = $res->getBody();
        $this->assertContains("IP Geo Data tool", $body);
    }

    public function testIpActionSuccess()
    {
        $res = $this->controller->ipAction("1.1.1.1");
        $exp = "is a valid ip-address";
        $body = $res->getBody();
        $this->assertContains($exp, $body);
    }

    public function testIpActionFail()
    {
        $res = $this->controller->ipAction("999.999.999.999");
        $exp = "invalid ip-address";
        $body = $res->getBody();
        $this->assertContains($exp, $body);
    }

    public function testApiActionDocs()
    {
        $res = $this->controller->apiAction();
        $exp = "<title>IP Geo API Docs";
        $body = $res->getBody();
        $this->assertContains($exp, $body);
    }
}
