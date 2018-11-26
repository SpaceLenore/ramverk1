<?php
use PHPUnit\Framework\TestCase;
use Anax\IpController\IpGeoWebController;



class StubTest extends TestCase
{
    public function testStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(IpGeoWebController::class);

        // Configure the stub.
        $stub->method('ipAction')
             ->willReturn([
                "ip" => "1.1.1.1"
            ]);

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->doSomething());
    }
}
