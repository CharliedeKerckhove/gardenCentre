<?php
include('../includes/db.php');
if(isset($_POST['order'])){
        $query1 ='SELECT * FROM `products` WHERE SubCategoryID = '.$_SESSION['y'].' ORDER BY '.$_POST['order'].'';
    }
else {
    $query1 ='SELECT * FROM `products` WHERE SubCategoryID = '.$_SESSION['y'].' ORDER BY ProductName ASC';
}
    $smt1 = $DBH->prepare($query1);
    $smt1->execute();
if($smt1->rowCount()>0){while($row=$smt1->fetch(PDO::FETCH_ASSOC)){ echo "
<div class='productBox'>
    <img class='productImg' src='".$row['ProductImage']."' />
    <h4 class='productName'>
        ".$row['ProductName']."
    </h4>
    <h4 class='productPrice'>&#163;
        ".$row['ProductPrice']."
    </h4>
    <button type='submit' id='product' class='addBtn' pid='".$row['ProductID']."'>Add To Basket</button>
</div>
"; }
}else {
    echo "No Products Within Database";
}
?>
