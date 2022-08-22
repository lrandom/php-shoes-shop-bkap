<?php
session_start();
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\user", "", __DIR__); //C:\xampp\htdocs\shops\
require_once $dir . 'dals/UserDAL.php'; //relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
$dal = new UserDAL();
if(isset($_POST['email'])){
   $checked = $dal->addOne($_POST);
   if($checked){
    //flash session
     $_SESSION['add-status']= [
        'success'=>1,
        'message'=>'Add successfully'
     ];
   }else{
    $_SESSION['add-status']= [
        'success'=>0,
        'message'=>'Add failed'
    ];
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once './../commons/head.php'; ?>

<body>
    <div class="container">
        <?php include_once './../commons/nav.php'; ?>
        
        <div class="row">
            <?php
             if(isset($_SESSION['add-status'])){
                if($_SESSION['add-status']['success']==1){
                    echo '<div class="alert alert-success" role="alert">
                    '.$_SESSION['add-status']['message'].'
                  </div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">
                    '.$_SESSION['add-status']['message'].'
                  </div>';
                }
                unset($_SESSION['add-status']);
             }
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" required class="form-control" name="email" id="exampleFormControlInput1">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone" required class="form-control"  name="phone" id="phone">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" required class="form-control" name="password" id="password">
                </div>

                <div>
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

        <?php include_once './../commons/footer.php'; ?>
    </div>
</body>

</html>