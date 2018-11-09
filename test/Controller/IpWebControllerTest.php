<?php

namespace Anax\IpController;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class IpWebControllerTest extends TestCase
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
        $this->controller = new IpWebController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();
        $body = $res->getBody();
        $this->assertContains("both IPv4 and IPv6", $body);
    }


    public function testindexActionPostInvalid()
    {
        $res = $this->controller->indexActionPost();
        $body = $res->getBody();
        $this->assertContains("IP Check tool: result", $body);
    }

    public function testindexActionPostValid()
    {
        $_POST["ip"] = "192.168.1.1"; //this is bad code and should be fixed
        $res = $this->controller->indexActionPost();
        $body = $res->getBody();
        $this->assertContains("IP Check tool: result", $body);
    }

    public function testApiActionGet()
    {
        $res = $this->controller->apiActionGet();
        $body = $res->getBody();
        $this->assertContains("IP Check tool API", $body);
    }
}
