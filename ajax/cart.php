<?php
include('../includes/db.php');

 if(isset($_POST['productID'])){
     
        $productID = $_POST['productID'];
        $userID = $_SESSION['customerData']['CustomerID'];
     
        $query2 = 'SELECT * FROM cart WHERE ProductID = '.$productID.' AND CustomerID = '.$userID.'';
        $smt2 = $DBH->prepare($query2);
        $smt2->execute();
    
        if($smt2->rowCount()>0){
            echo "<h2 class='errormsg'>Product is already in your basket</h2>";
        } else {
            $query3 = 'SELECT * FROM products WHERE ProductID = '.$productID.'';
            $smt3 = $DBH->prepare($query3);
            $smt3->execute();
            
            $row3 = $smt3->fetch(PDO::FETCH_ASSOC);
                $productID = $row3['ProductID'];
                $productName = $row3['ProductName'];
                $productQuantity = $row3['ProductQuantity'];
                $productPrice = $row3['ProductPrice'];
                $productImage = $row3['ProductImage'];
            
            $query4 = 'INSERT INTO cart(CartID, CustomerID, ProductID, ProductName, ProductQuantity, ProductPrice, ProductImage, CartQuantity, TotalAmount) VALUES (NULL, :customerID, :productID, :productName, :productQuantity, :productPrice, :productImage, 1, :totalAmount)';
            $smt4 = $DBH->prepare($query4);
                $smt4->bindParam(':customerID', $userID);
                $smt4->bindParam(':productID', $productID);
                $smt4->bindParam(':productName', $productName);
                $smt4->bindParam(':productQuantity', $productQuantity);
                $smt4->bindParam(':productPrice', $productPrice);
                $smt4->bindParam(':productImage', $productImage);
                $smt4->bindParam(':totalAmount', $productPrice);
            $smt4->execute();
            echo "<h2 class='successmsg'>Product has been added to your basket</h2>";
        }
    }
?>
