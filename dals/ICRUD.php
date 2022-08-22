<?php 
 interface ICRUD{
    public function getList();//R
    public function getOne($id);//R - one
    public function addOne($data);//C
    public function deleteOne($id);//D
    public function updateOne($id,$data);//U
 }
?>