<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "ipStackConnector" => [
            "shared" => true,
            "callback" => function () {
                $ipscon = new \Anax\Connectors\IpstackConnector();
                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("ApiTokens.php");
                $ipscon->setKeys($config['config']);

                return $ipscon;
            }
        ],
    ],
];
