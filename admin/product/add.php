<?php
session_start();
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\product", "", __DIR__); //C:\xampp\htdocs\shops\
require_once $dir . 'dals/ProductDAL.php'; //relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
require_once $dir . 'dals/CategoryDAL.php';

$dal = new ProductDAL();
$categoryDAL = new CategoryDAL();
$categoryList = $categoryDAL->getList();
if (isset($_FILES['image']) && $_FILES['image']['name'] != null && isset($_POST['name'])) {
    $newDir  = date('m') . '-' . date('Y'); //08-2022
    $relativeDir = '/uploads/' . $newDir;
    $newDir = $dir . $relativeDir;
    if (!file_exists($newDir) || is_file($newDir)) {
        mkdir($newDir);
    }
    $imageName = time() . $_FILES['image']['name'];
    $fullImagePath = $newDir . '/' . $imageName;
    try {
        //code...
        move_uploaded_file($_FILES['image']['tmp_name'], $fullImagePath);
        $data = $_POST;
        $data['image'] = $relativeDir . '/' . $imageName;
        $data['content']=htmlentities($data['content']);
        $checked = $dal->addOne($data);
        if ($checked) {
            //flash session
            $_SESSION['add-status'] = [
                'success' => 1,
                'message' => 'Add successfully'
            ];
        } else {
            $_SESSION['add-status'] = [
                'success' => 0,
                'message' => 'Add failed'
            ];
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}
// if(isset($_POST['name'])){
//    $checked = $dal->addOne($_POST);
//    if($checked){
//     //flash session
//      $_SESSION['add-status']= [
//         'success'=>1,
//         'message'=>'Add successfully'
//      ];
//    }else{
//     $_SESSION['add-status']= [
//         'success'=>0,
//         'message'=>'Add failed'
//     ];
//    }
// }

?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<?php include_once './../commons/head.php'; ?>

<body>
    <div class="container">
        <?php include_once './../commons/nav.php'; ?>

        <div class="row">
            <?php
            if (isset($_SESSION['add-status'])) {
                if ($_SESSION['add-status']['success'] == 1) {
                    echo '<div class="alert alert-success" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
                }
                unset($_SESSION['add-status']);
            }
            ?>
            <form method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" required class="form-control" name="image" id="image">
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" required class="form-control" name="name" id="name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" required class="form-control" name="price" id="price">
                </div>


                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="category">
                        <?php foreach ($categoryList as $category) {
                        ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content">

                    </textarea>
                </div>


                <div>
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

        <?php include_once './../commons/footer.php'; ?>
    </div>
</body>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    }
                ]
            },

        })
        .catch(error => {
            console.log(error);
        });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>

</html>