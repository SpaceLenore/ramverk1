<?php
/**
* Config file for api tokens
*
* Currently contains
*  - ipstack
*/

namespace Anax\Config;

class ApiTokens
{
    public function getApiTokens()
    {
        // Don't worry about leaking these api keys they
        // have been stolen and uploaded for unit tests.
        // consider this an example file
        return [
            "ipstack" => '59f40c392b861e29e674546a49e37b53',
        ];
    }
}
