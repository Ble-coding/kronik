<?php
include 'layouts/breadcrumb.php';

$title = "Faq";
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Faq'],
];

renderBreadcrumb($title, $breadcrumbs);
?>
