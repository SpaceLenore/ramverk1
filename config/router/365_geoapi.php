<?php
/**
 * Load the geoip as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Geo API",
            "mount" => "geoapi",
            "handler" => "\Anax\IpController\IpGeoRestController",
        ],
    ]
];
