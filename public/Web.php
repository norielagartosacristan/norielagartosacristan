<?php

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
switch ($url) {
    case 'cj-products':
        $controller = new CJDropshippingController();
        $controller->listProducts();
        break;
    default:
        // Load default controller
        break;
}
