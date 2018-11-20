<?php

namespace Anax\Connectors;

use Anax\Common\CurlHandler;
/**
* Connector class for the ipstack api
*/
class IpstackConnector
{

    /**
    * Function to get config from path
    * @param configPath path for the config that's loaded
    */
    function getConfig ($configPath)
    {
        return include($configPath);
    }

    /**
    * Fetching the api data for the specified ip
    * @param ip the ip address to be checked
    * @param configPath path for the config that's loaded
    */
    function fetchIpData ($ip, $configPath)
    {
        $curl = new CurlHandler();
        //Load key from configuration
        $keys = $this->getConfig($configPath);
        $access_key = $keys['ipstack'];
        $address = 'http://api.ipstack.com/' . $ip . '?access_key=' . $access_key;
        $jsonResponse = $curl->JsonCurl($address);
        return $jsonResponse;
    }
}
