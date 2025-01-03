<?php
include 'layouts/breadcrumb.php';

$title = "À Propos";
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'À Propos'],
];

renderBreadcrumb($title, $breadcrumbs);
?>
