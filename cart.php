<?php 
 session_start();
 require_once 'config.php';
 require_once 'Utils.php';
 $cart = $_SESSION['cart'] ?? null;
 if(isset($_GET['action']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $action =$_GET['action'];
    if($action=='change-quantity'){
     
        if(is_numeric($id) && is_numeric($_GET['step'])){
            $step = $_GET['step'];
            for($i=0;$i<count($cart);$i++){
                if($cart[$i]['product']->id==$id && ($cart[$i]['quantity']+$step)>0) {
                      //đã có sp hiện tại trong giỏ hàng
                      $cart[$i]['quantity']+=$step;  
                      $_SESSION['cart']= $cart;
                      break;
                }
            }
        }
    }else if($action=='remove'){
        for($i=0;$i<count($cart);$i++){
            if($cart[$i]['product']->id==$id){
               array_splice($cart,$i,1);
               $_SESSION['cart']= $cart;
               break;
            }
        }
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto">
    <?php if($cart==null){
        echo '<p>Giỏ hàng đang trống</p>';
    }else{
        ?>

        <table class="table-fixed" style="width:100%;overflow-x:auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $cartItem) {
                   ?>
                <tr>
                    <td><?php echo $cartItem['product']->id; ?></td>
                    <td><img src="<?php echo BASE_URL.$cartItem['product']->image; ?>" width="100"/></td>
                    <td><?php echo $cartItem['product']->name; ?></td>
                    <td><?php echo Utils::formatMoney( $cartItem['product']->price); ?></td>
                    <td>
                       <div class="flex items-center justify-center gap-8">
                       <a href="?action=change-quantity&id=<?php echo  $cartItem['product']->id; ?>&step=-1" class="cursor-pointer w-5 h-5 flex justify-center items-center inline-block bg-black text-white rounded">
                        <span>-</span>
                      </a>    
                        <?php echo $cartItem['quantity']; ?>
                      <a href="?action=change-quantity&id=<?php echo  $cartItem['product']->id; ?>&step=1" class="cursor-pointer w-5 h-5 flex justify-center items-center inline-block bg-black text-white rounded">
                        <span>+</span>
                      </a>
                       </div>
                    </td>
                    <td>
                        <?php echo Utils::formatMoney($cartItem['product']->price*$cartItem['quantity']); ?>
                    </td>
                    <td>
                    <a href="?action=remove&id=<?php echo  $cartItem['product']->id; ?>&step=1" class="cursor-pointer w-16 h-5 flex justify-center items-center inline-block bg-black text-white rounded">
                        Remove
                      </a>
                    </td>
                </tr>
                   <?php
                } ?>
            </tbody>
        </table>
        <?php
    } ?>
    </div>
     
    <style>
        table td{
            text-align: center;
        }

        table td img{
            margin:0px auto;
        }
    </style>
</body>
</html>