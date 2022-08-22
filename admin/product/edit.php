<?php
session_start();
if($_GET['id'] && !is_numeric($_GET['id'])){
    header('Location:list.php');
}
$id=$_GET['id'];
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\category", "", __DIR__); //C:\xampp\htdocs\shops\
require_once $dir . 'dals/CategoryDAL.php'; //relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
$dal = new CategoryDAL();


if(isset($_POST['name'])){
   $checked = $dal->updateOne($id,$_POST);
   if($checked){
    //flash session
     $_SESSION['add-status']= [
        'success'=>1,
        'message'=>'Edit successfully'
     ];
   }else{
    $_SESSION['add-status']= [
        'success'=>0,
        'message'=>'Edit failed'
    ];
   }
}

$obj = $dal->getOne($id);

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
                    <label for="name" class="form-label">Name</label>
                    <input type="name" required class="form-control" value="<?php echo $obj->name; ?>" name="name" id="name">
                </div>

    

                <div>
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>

        <?php include_once './../commons/footer.php'; ?>
    </div>
</body>

</html>