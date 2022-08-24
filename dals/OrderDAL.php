<?php 
  require_once 'DB.php';
  require_once 'ICRUD.php';
  class OrderDAL extends DB {
    public function __construct(){
        parent::__construct();//chạy các lệnh trong constructor của cha 
        $this->setTableName("orders");
    }
    public function makeOrder($cart){
        $this->pdo->beginTransaction();
        try{
        $prp = $this->pdo->prepare("INSERT INTO $this->tableName(date_created,status,sub_total,tax,total,user_id) 
        VALUES(:date_created,:status,:sub_total,:tax,:total,:user_id)");
        $prp->bindParam(':date_created',$dateCreated);
        $prp->bindParam(':status',$status); //1- pending(cho),2- dang xu ly, 3- huy, 4- hoan thanh
        $prp->bindParam(':sub_total',$subTotal);
        $prp->bindParam(':tax',$tax);
        $prp->bindParam(':total',$total);
        $prp->bindParam(':user_id',$userId);
        $subTotal=0;
        foreach($cart as $cartItem){
            $subTotal+=($cartItem['product']->price*$cartItem['quantity']);
        }
        $tax = 10;
        $total = $subTotal+($subTotal*($tax/100));
        $dateCreated = date('YYYY-mm-dd');
        $userId = 1;
        $status = 1;
        $prp->execute();

        $lastOrderId = $this->pdo->lastInsertId();//lấy về id của bản ghi mới nhất chèn vừa ms chèn vào bảng order
        $prp = $this->pdo->prepare("INSERT INTO order_details(product_id,order_id,price,quantity,sub_total) 
        VALUES(:product_id,:order_id,:price,:quantity,:sub_total)");
        $prp->bindParam(':product_id',$productId);
        $prp->bindParam(':order_id',$orderId);
        $prp->bindParam(':price',$price);
        $prp->bindParam(':quantity',$quantity);
        $prp->bindParam(':sub_total',$subTotal);
        foreach($cart as $cartItem){
            $productId = $cartItem['product']->id;
            $orderId = $lastOrderId;
            $price =  $cartItem['product']->price;
            $quantity =  $cartItem['quantity'];
            $subTotal = ($cartItem['product']->price*$cartItem['quantity']);
            $prp->execute();
        }
            $this->pdo->commit();
            return true;
        }catch(Exception $e){
            $this->pdo->rollBack();
            echo $e->getMessage();
            return false;
        }
    }//C
  }
?>