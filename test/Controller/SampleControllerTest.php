<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class SampleControllerTest extends TestCase
{
    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->indexAction();
        $this->assertContains("db is active", $res);
    }



    /**
     * Test the route "info".
     */
    public function testInfoActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->infoActionGet();
        $this->assertContains("db is active", $res);
    }



    /**
     * Test the route "dump-di".
     */
    public function testDumpDiActionGet()
    {
        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Setup the controller
        $controller = new SampleController();
        $controller->setDI($di);
        $controller->initialize();

        // Do the test and assert it
        $res = $controller->dumpDiActionGet();
        $this->assertContains("di contains", $res);
        $this->assertContains("configuration", $res);
        $this->assertContains("request", $res);
        $this->assertContains("response", $res);
    }

    /**
    * Test the createActionGet
    */
    public function testCreateActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->createActionGet();
        $this->assertContains("db is active", $res);
    }

    /**
    * Test the createActionGet
    */
    public function testCreateActionPost()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->createActionPost();
        $this->assertContains("db is active", $res);
    }

    /**
    * test the argumentActionGet
    */
    public function testArgumentActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->argumentActionGet("hej");
        $this->assertContains("db is active, got argument 'hej'", $res);
    }

    /**
    * test the defaultArgumentActionGet
    */
    public function testDefaultArgumentActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->defaultArgumentActionGet();
        $this->assertContains("db is active, got argument 'default'", $res);
    }

    /**
    * test the typedArgumentActionGet
    */
    public function testTypedArgumentActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->typedArgumentActionGet('hej', 123);
        $this->assertContains("db is active, got string argument 'hej' and int argument '123'.", $res);
    }

    /**
    * test the variadicActionGet
    */
    public function testVariadicActionGet()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->variadicActionGet('unit', 1, 'test', 'hope-this-passes');
        $this->assertContains("db is active, got '4' arguments: unit, 1, test, hope-this-passes", $res);
    }

    /**
    * test the catchAll
    */
    public function testCatchAll()
    {
        $controller = new SampleController();
        $controller->initialize();
        $res = $controller->catchAll();
        $this->assertEquals(null, $res);
    }
}
