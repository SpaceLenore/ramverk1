<?php

namespace Anax\Connectors;

use Anax\Common\CurlHandler;
use Anax\Config\ApiTokens;

/**
* Connector class for the ipstack api
*/
class IpstackConnector
{

    private $keys;
    //
    // /**
    // * Function to get config from path
    // * @param configPath path for the config that's loaded
    // */
    // protected function getConfig()
    // {
    //     $tokens = new ApiTokens();
    //     return $tokens->getApiTokens();
    // }

    public function setKeys($keyData)
    {
        $this->keys = $keyData;
    }

    /**
    * Fetching the api data for the specified ip
    * @param ip the ip address to be checked
    * @param configPath path for the config that's loaded
    */
    public function fetchIpData($ipaddr)
    {
        $curl = new CurlHandler();
        //Load key from configuration
        $accessKey = $this->keys['ipstack'];
        $address = 'http://api.ipstack.com/' . $ipaddr . '?access_key=' . $accessKey;
        $jsonResponse = $curl->jsonCurl($address);
        return $jsonResponse;
    }
}
