<?php
// app/controllers/HomeController.php

class HomeController {
    public function index() {
        // Load the home view
        require_once '../app/views/home.php';
    }
}
