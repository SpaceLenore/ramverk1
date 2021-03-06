<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "class" => "my-navbar",

    // Here comes the menu items/structure
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
            "text" => "Books",
            "url" => "book",
            "title" => "Lista med böcker",
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
    ],
];
