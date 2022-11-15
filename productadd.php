<?php
$protype = new Protypes();
$protypes = $protype->getAllPrototype();
 echo '<div class="section-nav">';
 echo '<ul class="section-tab-nav tab-nav">';

    foreach ($protypes as $key => $value) {

        echo "<li><a href='store.php?lm=1&id=".$value["type_id"]."'>".$value["type_name"]."</a></li>";

    }
 echo '</ul></div>';

?>