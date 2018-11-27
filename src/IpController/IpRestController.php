<?php

namespace Anax\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample JSON controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 */
class IpRestController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    private $db = "not active";



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        $this->db = "active";
    }



    /**
     * This is the index method action, it handles:
     * GET METHOD mountpoint
     * GET METHOD mountpoint/
     * GET METHOD mountpoint/index
     *
     * @return array
     */

    public function indexActionGet() : array
    {
         // Deal with the action and return a response.
        $json = [
            "error" => "Not found,",
            "helptext" => "try sending your ip over post instead",
        ];
        return [$json, 404];
    }

    public function indexActionPost() : array
    {

        $request = $this->di->get("request");

        $ipaddr = $request->getPost("ip");
        $isValid = "";
        $domain = "";

        if (filter_var($ipaddr, FILTER_VALIDATE_IP)) {
            $isValid = true;
            $domain = gethostbyaddr($ipaddr);
        } else {
            $isValid = false;
        }
        // Deal with the action and return a response.
        $json = [
            "ip" => $ipaddr,
            "valid" => $isValid,
            "domain" => $domain,
        ];
        return [$json];
    }
}
