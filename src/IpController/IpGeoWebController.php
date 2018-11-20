<?php

namespace Anax\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

use Anax\Connectors\IpstackConnector;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpGeoWebController implements ContainerInjectableInterface
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
        $this->ipstack = new IpstackConnector();
    }



    /**
     * GET route for ip checker tool, displays a form
     *
     * @return object
     */
    public function indexAction() : object
    {
        $title = "IP Geo Data tool";

        $page = $this->di->get("page");


        $page->add("geo/form", [
            "default_ip" => $_SERVER['REMOTE_ADDR'],
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * POST route for ip checker tool, displays the result
     *
     * @return object
     */
    public function ipAction($ipin) : object
    {
        $title = "IP Check tool: result";

        $request = $this->di->get("request");
        $page = $this->di->get("page");

        $ipaddr = $ipin;
        $isValid;
        $domain = "";

        if (filter_var($ipaddr, FILTER_VALIDATE_IP)) {
            $isValid = "valid";
            $domain = gethostbyaddr($ipaddr);
            $configPath = __DIR__ . "/../../config/api_tokens.php";
            $geodata = $this->ipstack->fetchIpData($ipaddr, $configPath);
        } else {
            $isValid = "invalid";
            $domain = "";
            $geodata = "";
        }

        $page->add("geo/result", [
            "ip" => $ipaddr,
            "valid" => $isValid,
            "domain" => $domain,
            "geodata" => $geodata,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function apiAction()
    {
        $title = "IP Geo API Docs";

        $page = $this->di->get("page");

        $page->add("geo/api_doc", []);

        return $page->render([
            "title" => $title,
        ]);
    }
}
