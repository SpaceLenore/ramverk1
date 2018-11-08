<?php
/**
 * Load the ip checker as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Checker",
            "mount" => "ip",
            "handler" => "\Anax\IpController\IpWebController",
        ],
    ]
];
