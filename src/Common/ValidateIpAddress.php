<?php

namespace Anax\Common;

class ValidateIpAddress
{
    public function validateIp($ipAddr)
    {
        if (filter_var($ipAddr, FILTER_VALIDATE_IP)) {
            return true;
        }
        return false;
    }

    public function getDomain($ipAddr)
    {
        if ($this->validateIp($ipAddr)) {
            return gethostbyaddr($ipAddr);
        }
        return false;
    }
}
