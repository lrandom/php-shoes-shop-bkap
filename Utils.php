<?php 
class Utils{
    public static function formatMoney($money){
       return  number_format($money,0,'.',',').'$';
    }
}
?>