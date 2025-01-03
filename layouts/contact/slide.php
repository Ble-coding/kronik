<?php
include 'layouts/breadcrumb.php';

$title = "Contact";
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Contact'],
];

renderBreadcrumb($title, $breadcrumbs);
?>
