<?php
    require("config.php");
    require("model/db.php");
    require("model/product.php");
    require("model/user.php");
    require("model/admin.php");
    $product= new Product();
    $productAll = $product->getAllProduct();
    $user =  new User();
    $userAll= $user->getAllUs();
    $admin = new AD();
?>
<?php
$tempUS = '';
$out = "";
$tempUS2 ='';

if ($_POST['user_name']!='') {
    $tempUS2=$_POST['user_name'];
}else{
    $tempUS= $admin->getMessNew();
    $tempUS2 =$tempUS[0]['user_name']; 
}
if (isset($_POST['action'])) {
    if ($_POST['mess']!= "") {
        $admin->InsertMess($_POST['mess'],$tempUS2);
    }
}

if ($tempUS2!='') {
    foreach ($admin->getMess($tempUS2) as $key => $value) {

        if ($value['ad_name'] =="admin") {
            if ($value['messus'] !=1&& $value['messus']!='') {
                # code...
                $out.=  "<div class='direct-chat-msg'>
                <div class='direct-chat-infos clearfix'>
                    <span class='direct-chat-name float-left'>".$value['user_name']."</span>
                    <span class='direct-chat-timestamp float-right'>".$value['date_mess']."</span>
                </div>
                 
                <img class='direct-chat-img' src='dist/img/user1-128x128.jpg' alt='message user image'>
                <!-- /.direct-chat-img -->
                <div class='direct-chat-text'>
                    ".$value['messus']."
                </div>
               
                </div>";
            }
            if ($value['messad'] !="") {
                # code...
                $out.= "<div class='direct-chat-msg right'>
                <div class='direct-chat-infos clearfix'>
                    <span class='direct-chat-name float-right'>".$value['ad_name']."</span>
                    <span class='direct-chat-timestamp float-left'>".$value['date_mess']."</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class='direct-chat-img' src='dist/img/user3-128x128.jpg' alt='message user image'>
                <!-- /.direct-chat-img -->
                <div class='direct-chat-text'>
                    ".$value['messad']."
                </div>
                <!-- /.direct-chat-text -->
            </div>";
            }
        }
    }
}
echo $out;
?>