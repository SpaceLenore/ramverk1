<h1>Geo IP tool</h1>

<!-- TODO: FIX PRINT WITHOUT ERROR ON INVALID DOMAIN -->

<div class="ip-box <?= $valid ?>">
    <h2><?= htmlentities($ip) ?></h2>
    is a <?= htmlentities($valid) ?> ip-address
    <?php
    if ($domain) {
        echo "and has the domain " . $domain;
    } else {
        echo " and no domain was found";
    }
    if (isset($geodata['location'])) {
        echo "<br>Location: " . $geodata['location']['country_flag_emoji'] . ' ' .
        $geodata['country_name'];

        if ($geodata['region_name'] && $geodata['city']) {
            echo "<br> City " . $geodata['city'] . ', '  . $geodata['region_name'];
        }
    }
    ?>
</div>
