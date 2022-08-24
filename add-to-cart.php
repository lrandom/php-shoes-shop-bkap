<?php 
session_start();
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('Location:index.php');
}

$id = $_GET['id'];
require_once 'dals/ProductDAL.php';
$dal = new ProductDAL();
$product= $dal->getOne($id);
if(!isset($_SESSION['cart'])){
  //chưa có giỏ hàng
  $_SESSION['cart'] = [
    [
        'product'=>$product,
        'quantity'=>1
    ]
    ];
}else{
    //có giỏ hàng 
    $flag = true;
    $cart = $_SESSION['cart'];
    for($i=0;$i<count($cart);$i++){
        if($cart[$i]['product']->id==$id){
              //đã có sp hiện tại trong giỏ hàng
              $cart[$i]['quantity']+=1;  
              $flag = false;
              break;
        }
    }

    //chưa có sp
    if($flag){
        array_push($cart,[
           'product'=>$product,
           'quantity'=>1
        ]);
        // $cart[] = [
        //     'product'=>$product,
        //     'quantity'=>1
        // ];
    }
    $_SESSION['cart']=$cart;
}

header('Location:cart.php');
?>