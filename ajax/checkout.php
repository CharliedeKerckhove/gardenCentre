<?php
include('../includes/db.php');

    $customer = $_SESSION['customerData']['CustomerID'];

if(isset($_POST['cart'])){
    $query = "SELECT * FROM cart WHERE CustomerID = :customer";
    $result = $DBH->prepare($query);
    $result->bindParam(':customer', $customer);
    $result->execute();

    if($result->rowCount()>0){
        while($row=$result->fetch(PDO::FETCH_ASSOC)){ echo "
                <tr>
                    <td>".$row['ProductName']."</td>
                    <td>
                        <input type='text' class='qty' pid='".$row['ProductID']."' value = ".$row['CartQuantity']." placeholder = ".$row['CartQuantity']." id='qty-".$row['ProductID']."'></input>
                        <button update_id = '".$row['ProductID']."' class='update'>Update</button>
                    </td>
                    <td>
                        <input type='text' class='qty invis' pid='".$row['ProductID']."' value = '".$row['ProductPrice']."' placeholder = '&#163; ".$row['ProductPrice']."' id='price-".$row['ProductID']."' disabled></input>
                    </td>
                    <td>
                        <input type='text' class='qty invis' pid='".$row['ProductID']."' value = '".$row['TotalAmount']."' placeholder = '&#163; ".$row['TotalAmount']."' id='total-".$row['ProductID']."' disabled></input>
                    </td>
                    <td>
                        <button remove_id='".$row['ProductID']."' id='remove' class='headerIcons'>
                            <i class='fas fa-times-circle'></i>
                        </button>
                    </td>
                </tr>";
        }
    }
}
if(isset($_POST['removeID'])){
    $product = $_POST['removeID'];
    $query2 = "DELETE FROM cart WHERE CustomerID = :customer AND ProductID = :product";
    $result2 = $DBH->prepare($query2);
    $result2->bindParam(':customer', $customer);
    $result2->bindParam(':product', $product);
    $result2->execute();
}

if(isset($_POST['updateID'])){
    $product = $_POST['updateID'];
    $quantity = $_POST['qty'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    
    $query3 = "UPDATE cart SET CartQuantity = '$quantity', ProductPrice = '$price', TotalAmount = '$total' WHERE CustomerID = '$customer' AND ProductID = '$product'";
    $result3 = $DBH->prepare($query3);
    $result3->execute();
}
if(isset($_POST['total'])){
      
    $query4 = "SELECT SUM(TotalAmount) As cartTotal FROM cart WHERE CustomerID = '$customer'";
    $result4 = $DBH->prepare($query4);
    $result4->execute();
    if($result4->rowCount()>0){
        while($row=$result4->fetch(PDO::FETCH_ASSOC)){ 
            echo "Cart Total: &#163;$row[cartTotal]";
        }
    }
}
?>