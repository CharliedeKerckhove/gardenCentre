<?php
    if(!empty($_SESSION['loggedin'])&&($_SESSION['loggedin'] = "true")){
        
    }
    else{
        echo "<script> window.location.assign('index.php?p=signin'); </script>";
    }
?>
<div class="content">
    <h1 class="title">Your Cart</h1>
    <div id="cartTotal" class="cartTotal">
<!--
        Cart Total: &#163;
-->
    </div>
    <div class="tblCont">
        <table class='cartTable'>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Total</th>
                    <th>Remove Item</th>
                </tr>
            </thead>
            <tbody id="cartTbl">
                
            </tbody>
        </table>
    </div>
    <br>
    <img class="cartPay" src="images/PayPal.PNG">
</div>
