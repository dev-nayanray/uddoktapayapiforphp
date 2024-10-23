<?php 
require_once('functions.php');

$full_name="Mr. Jon";
 $email="abcde@gmail.com";
 $amount=100;
 $order_id=10;
 $user_id=40;


echo '<a href="'.pay_url($full_name, $email, $amount, $order_id, $user_id).'"> Pay Now 100 </a>';

?>



<form action = 'payment2.php' method = 'post'>
    <input type = 'text'  name="cID" value="441">
    <input type = 'text' name="cname" value="Mr jon">
    <input type = 'text' name="cemail" value="abced@gmail.com">
    <input type = 'number' name="cpayamount" value="300">
    <input type = 'text' name="corderID" value="123">
    <input type="submit" name="paynowbtn" value="Pay Now 200">
</form>