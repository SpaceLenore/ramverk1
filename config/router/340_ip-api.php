<?php
/**
 * Load the ip checker as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Checker API",
            "mount" => "ip-api",
            "handler" => "\Anax\IpController\IpRestController",
        ],
    ]
];
