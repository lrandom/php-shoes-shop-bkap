<?php 
 //echo __DIR__; //C:\xampp\htdocs\shops\admin\user
 $dir = str_replace("admin\category","",__DIR__);//C:\xampp\htdocs\shops\
 require_once $dir.'dals/CategoryDAL.php';//relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
 $dal = new CategoryDAL();
 if(isset($_GET['action'])){
    $id = $_GET['id'];
   
    if(is_numeric($id) && $_GET['action']=='delete'){
        $dal->deleteOne($id);
    }
 }
 $list = $dal->getList();
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once './../commons/head.php'; ?>

<body>
    <div class="container">
        <?php include_once './../commons/nav.php'; ?>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list as $r): ?>
                    <tr>
                        <th scope="row"><?php echo $r->id; ?></th>
                        <td><?php echo $r->name; ?></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r->id; ?>">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger" href="?action=delete&id=<?php echo $r->id; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>

        <?php include_once './../commons/footer.php'; ?>
    </div>
</body>

</html>