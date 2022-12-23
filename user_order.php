<?php
require("config.php");
require("model/db.php");
require("model/product.php");
require("model/user.php");
require("model/admin.php");
require("model/cart.php");
$product = new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll = $user->getAllUs();
$ad = new AD();
$cart = new Cart();
$out = '';
$tempUS = '';
$tempUS2 ='';
if ($_POST['user_name']!='') {
    $tempUS2=$_POST['user_name'];
}else{
    $tempUS= $admin->getMessNew();
    $tempUS2 =$tempUS[0]['user_name']; 
}
$out.= '<thead>
    <tr>
        <th>Order ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Price</th>
    </tr>
</thead>
<tbody>';

foreach ($product->getProductOrder($tempUS2) as $key => $value) {
  
        $out.=' <tr>

            <td><a href="pages/examples/invoice.html">'. $value["id"] .'</a></td>
            <td>'.$value['name'].'</td>
            <td><span class="badge badge-success ">Order</span></td>
            <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">'.$value['sale_price'].'</div>
            </td>
        </tr>
        </tbody>
        ';

}
echo $out;
?>