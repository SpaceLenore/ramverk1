<?php
/**
 * Configuration file for page which can create and put together web pages
 * from a collection of views. Through configuration you can add the
 * standard parts of the page, such as header, navbar, footer, stylesheets,
 * javascripts and more.
 */
return [
    // This layout view is the base for rendering the page, it decides on where
    // all the other views are rendered.
    "layout" => [
        "region" => "layout",
        "template" => "anax/v2/layout/horizon",
        "data" => [
            "baseTitle" => " | ramverk1",
            "bodyClass" => null,
            "favicon" => "favicon.ico",
            "htmlClass" => null,
            "lang" => "sv",
            "stylesheets" => [
                "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css",
                "css/horizon.min.css",
            ],
            "javascripts" => [
                "js/responsive-menu.js",
                "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js",
            ],
        ],
    ],

    // These views are always loaded into the collection of views.
    "views" => [
        [
            "region" => "header",
            "template" => "anax/v2/header/custom",
            "data" => [
                "homeLink"      => "",
                "siteLogoText"  => "Ramverk 1",
            ],
        ],
        [
            "region" => "navbar",
            "template" => "anax/v2/navbar/custom",
            "data" => [
                "navbarConfig" => require __DIR__ . "/navbar/responsive.php",
            ],
        ],
        [
            "region" => "footer",
            "template" => "anax/v2/columns/multiple_columns",
            "data" => [
                "class"  => "footer-column col-md-4",
                "columns" => [
                    [
                        "template" => "anax/v2/block/default",
                        "contentRoute" => "block/footer-col-1",
                    ],
                    [
                        "template" => "anax/v2/block/default",
                        "contentRoute" => "block/footer-col-2",
                    ],
                    [
                        "template" => "anax/v2/block/default",
                        "contentRoute" => "block/footer-col-3",
                    ]
                ]
            ],
            "sort" => 1
        ],
        [
            "region" => "copyright",
            "template" => "anax/v2/block/default",
            "data" => [
                "class"  => "site-copyright",
                "contentRoute" => "block/footer",
            ],
            "sort" => 2
        ],
    ],
];
