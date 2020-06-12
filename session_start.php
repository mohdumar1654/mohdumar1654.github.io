<?php
session_start();

   if (isset($_SESSION['products']))
    {   
        
        $products = $_SESSION['products'];
    }
    else
    {
        $products = array();
    }
    $url = basename($_SERVER['REQUEST_URI']);    
?>