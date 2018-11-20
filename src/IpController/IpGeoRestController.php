<?php

namespace Anax\IpController;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

use Anax\Connectors\IpstackConnector;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

class IpGeoRestController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    private $db = "not active";


    public function initialize() : void
    {
        // Use to initialise member variables.
        $this->db = "active";
        $this->ipstack = new IpstackConnector();
    }


    public function indexActionGet() : array
    {
        $json = [
            "error" => "No domain specified",
            "helptext" => "try geoapi/ip/:yourIP"
        ];

        return [$json, 200];
    }

    public function ipActionGet($ipaddr) : array
    {

        $request = $this->di->get("request");

        $ipaddr = $ipaddr;
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

        $json = [
            "ip" => $ipaddr,
            "valid" => $isValid,
            "domain" => $domain,
            "geodata" => $geodata,
        ];
        return [$json];
    }
}
