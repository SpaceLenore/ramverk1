<?php
/**
 * Load the geoip as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Geo Data",
            "mount" => "geoip",
            "handler" => "\Anax\IpController\IpGeoWebController",
        ],
    ]
];
