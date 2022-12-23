<?php
require("config.php");
require("modeladm/db.php");
require("modeladm/product.php");
require("modeladm/user.php");
require("modeladm/admin.php");
require("modeladm/manufacture.php");
require("modeladm/prototype.php");
$product= new Product();
$productAll = $product->getAllProduct();
$user =  new User();
$userAll= $user->getAllUs();
$ad = new AD();
$manu = new Manufacture();
$tye = new Protypes();
$out="";
if ($_POST['del2']) {
    $product->Del($_POST['del2']);
    header('localhost: productedit.php');
}
foreach ($product->getManuType() as $key => $value) {
    if ($_POST['id']== $value['id']) {
        $out.="
        <div class='card card-primary'>
          <div class='card-header'>
          <h3 class='card-title'>Product</h3>
          
          <div class='card-tools'>
          <button type='button' class='btn btn-tool' data-card-widget='collapse' title='Collapse'>
          <i class='fas fa-minus'></i>
          </button>
          </div>
          </div>
          <div class='card-body'>
          <input type='text'  name='id' value='".$value['id']."' style='display:none'; >
          <div class='form-group'>
          <label for='inputName'>Product Name</label>
          <input type='text' id='inputName' name='name' value='".$value['name']."' class='form-control' value='AdminLTE'>
          </div>
            <div class='form-group'>
              <label for='inputName'>Product Price</label>
              <input type='text' id='inputName'  name='price' value='".$value['price']."' class='form-control' value='AdminLTE'>
            </div>
            <div class='form-group'>
              <label for='inputDescription'>Product Description</label>
              <textarea id='inputDescription' name='description' class='form-control' rows='4'>".$value['description']."</textarea>
            </div>
            <div class='form-group'>
              <label for='inputDescription'>Product Details</label>
              <textarea id='inputDescription' name='detail' class='form-control' rows='4'>".$value['detail']."</textarea>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Brand</label>
              <select id='inputStatus' class='form-control custom-select' name='brand'>
                <option value='-1' selected disabled>Select one</option>
                ";
                  foreach ($manu->getAllManufacture() as $keymanu => $valuemanu) {

                      $out .="<option value='".$valuemanu['manu_id']."'>".$valuemanu['manu_name']."</option>";

                  }
            
                  $out.="
              </select>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Feature</label>
              <select id='inputStatus' class='form-control custom-select' name='feature'>
                <option value='-1' selected disabled>Select one</option>
                      <option value='0'>Not outstanding</option>
                      <option value='1'>Outstanding</option>
              </select>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Category</label>
              <select id='inputStatus' class='form-control custom-select' name='category'>
                <option value='-1' selected disabled>Select one</option>
                ";
                foreach ($tye->getAllPrototype() as $keytype => $valuetype) {
                    
                    $out.="
                      <option value='".$valuetype['type_id']."'>".$valuetype['type_name']."</option>
                        ";
                        
                  }
                  $out.="
              </select>
            </div>
            <div class='form-group'>
              <label for='inputEstimatedBudget'>Image</label>
              <input type='file' name='image' id='inputEstimatedBudget' class='form-control'>
            </div>
            <div class='form-group'>
              <label for='inputSpentBudget'>Image 2 details</label>
              <input type='file' name='image2' id='inputEstimatedDuration' class='form-control'>

            </div>
            <div class='form-group'>
              <label for='inputEstimatedDuration'>Image 3 details</label>
              <input type='file' name='image3' id='inputEstimatedDuration' class='form-control'>
            </div>
            <div class='form-group'>
              <label for='inputEstimatedDuration'>Image 4 details</label>
              <input type='file' name='image4' id='inputEstimatedDuration' class='form-control'>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      ";
    }
}
if ($_POST['id'] ==0) {
    $out.="
        <div class='card card-primary'>
          <div class='card-header'>
            <h3 class='card-title'>Product</h3>

            <div class='card-tools'>
              <button type='button' class='btn btn-tool' data-card-widget='collapse' title='Collapse'>
                <i class='fas fa-minus'></i>
              </button>
            </div>
          </div>
          <div class='card-body'>
            <div class='form-group'>
              <label for='inputName'>Product Name</label>
              <input type='text' id='inputName' name='name' class='form-control' >
            </div>
            <div class='form-group'>
              <label for='inputName'>Product Price</label>
              <input type='text' id='inputName' name='price' class='form-control' >
            </div>
            <div class='form-group'>
              <label for='inputDescription'>Product Description</label>
              <textarea id='inputDescription' name='description' class='form-control' rows='4'></textarea>
            </div>
            <div class='form-group'>
              <label for='inputDescription'>Product Details</label>
              <textarea id='inputDescription' name='detail' class='form-control' rows='4'></textarea>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Brand</label>
              <select id='inputStatus' class='form-control custom-select' name='brand'>
                <option value='-1' selected disabled>Select one</option>
                ";
                  foreach ($manu->getAllManufacture() as $keymanu => $valuemanu) {

                      $out .="<option value='".$valuemanu['manu_id']."'>".$valuemanu['manu_name']."</option>";

                  }
            
                  $out.="
              </select>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Feature</label>
              <select id='inputStatus' class='form-control custom-select' name='feature'>
                <option value='-1' selected disabled>Select one</option>
                      <option value='0'>Not outstanding</option>
                      <option value='1'>Outstanding</option>
              </select>
            </div>
            <div class='form-group'>
              <label for='inputStatus'>Category</label>
              <select id='inputStatus' class='form-control custom-select' name='category'>
                <option value='-1' selected disabled>Select one</option>
                ";
                foreach ($tye->getAllPrototype() as $keytype => $valuetype) {
                    
                    $out.="
                      <option value='".$valuetype['type_id']."'>".$valuetype['type_name']."</option>
                        ";
                        
                  }
                  $out.="
              </select>
            </div>
            <div class='form-group'>
              <label for='inputEstimatedBudget'>Image</label>
              <input type='file' name='image' id='inputEstimatedBudget' class='form-control'>
            </div>
            <div class='form-group'>
              <label for='inputSpentBudget'>Image 2 details</label>
              <input type='file' name='image2' id='inputEstimatedDuration' class='form-control'>

            </div>
            <div class='form-group'>
              <label for='inputEstimatedDuration'>Image 3 details</label>
              <input type='file' name='image3' id='inputEstimatedDuration' class='form-control'>
            </div>
            <div class='form-group'>
              <label for='inputEstimatedDuration'>Image 4 details</label>
              <input type='file' name='image4' id='inputEstimatedDuration' class='form-control'>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      ";
}
echo $out;
?>