<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "id" => "rm-menu",
    "wrapper" => null,
    "class" => "rm-default rm-mobile",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                ],
            ],
        ],
        [
            "text" => "IP-Checker tool",
            "url" => "ip",
            "title" => "Check if an ip is valid and what it's domain is",
        ],
        [
            "text" => "IP-CT API",
            "url" => "ip/api",
            "title" => "API DOCS",
        ],
        [
            "text" => "IP-Geo tool",
            "url" => "geoip",
            "title" => "Get geo data from ip",
        ],
        [
            "text" => "IP-Geo API",
            "url" => "geoapi",
            "title" => "Geo data API",
        ],
        [
            "text" => "Weather",
            "url" => "weather",
            "title" => "Väderdata",
        ],
        [
            "text" => "Weather API",
            "url" => "weather/api",
            "title" => "Väderdata API",
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
    ],
];
