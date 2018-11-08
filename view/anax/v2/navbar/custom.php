<?php

namespace Anax\View;


$items = $navbarConfig["items"] ?? [];

$classes = "navbar " . ($navbarConfig["class"] ?? null);



?><navbar <?= classList($classes) ?>>
<?php foreach ($items as $item) : ?>
    <a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a>
<?php endforeach; ?>
</navbar>
