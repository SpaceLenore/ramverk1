<h1>IP Checker tool</h1>

<p>Check if an ip is in a valid range.</p>

<div class="ip-box <?= $valid ?>">
    <h2><?= htmlentities($ip) ?></h2>
    is <?= htmlentities($valid) ?>
    <?php
    if ($domain) {
        echo "and has the domain " . $domain;
    } else {
        echo " and no domain was found";
    }
    ?>
</div>
<br>
<a href="">Check another?</a>
