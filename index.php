<?php
require_once 'dals/CategoryDAL.php';
require_once 'dals/ProductDAL.php';
require_once 'Utils.php';
$categoryDAL = new CategoryDAL();
$categoryList = $categoryDAL->getList();
$productDAL = new ProductDAL();
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
      <nav></nav>

      <?php
      foreach ($categoryList as $category) :
      ?>
         <?php $productList = $productDAL->getListByCategoryId($category->id); ?>

         <?php if(count($productList)==4){ ?>
         <h3 class="font-bold text-3xl mt-12"><?php echo $category->name; ?></h3>
        
         <div class="grid md:grid-cols-4 grid-cols-1 gap-4 mt-6">
            <?php foreach ($productList as $product) : ?>
               <article class="shadow">
                  <h4 class="md:font-bold font-normal"><?php echo $product->product_name; ?></h4>
                  <div>
                     <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/pyyixbczj6u5kiwhpjik/air-max-270-shoes-P0j2DN.png" alt="">
                  </div>
                  <div class="flex items-center justify-between gap-2">
                     <span><?php echo Utils::formatMoney($product->price) ?></span>
                     <span>
                        <a href="add-to-cart.php?id=<?php echo $product->product_id; ?>" class="rounded-sm block text-white bg-blue-500 p-3">Add To Cart</a>
                     </span>
                  </div>
               </article>
            <?php endforeach ?>
         </div>
         <?php }?>

      <?php endforeach; ?>


      <footer>

      </footer>
   </div>
</body>

</html>