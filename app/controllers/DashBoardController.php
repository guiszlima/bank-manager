<?php
class DashboardController{




    public function index()
    {
         
       
$user = $_SESSION['user'];
        require __DIR__ . '/../views/dashboard.php';
    }
}