<?php
// src/Controller/HomeController.php

namespace App\Controller;

class HomeController extends AppController
{
    public function index()
    {
        $this->layout= 'home'; 
    }
    
}
?>