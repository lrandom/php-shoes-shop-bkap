<?php
   session_start();
   $cart = $_SESSION['cart'] ?? null;
   if($cart){
     //tien hanh dat hang 
     require_once 'dals/OrderDAL.php';
     $orderDal = new OrderDAL();
     $orderDal->makeOrder($cart);
   }
?>