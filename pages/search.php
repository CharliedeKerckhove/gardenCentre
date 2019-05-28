<?php
    if(isset($_POST['submitSearch'])){
		$search = '%'.$_POST['search'].'%';
		$query = "SELECT * FROM products WHERE ProductName LIKE :search";
		$result = $DBH->prepare($query);
		$result->bindParam(':search', $search);
		$result->execute();
	}else{
        echo "<script> window.location.assign('index.php?p=checkout'); </script>";
	}


    
?>
<section class="productBackground">
    <div class="productBackgroundTxt">
        <h1>Searching for:
            <?php echo $_POST['search']; ?>
        </h1>
        <h2>Results found:
            <?php echo $result->rowCount(); ?>
        </h2>
    </div>
</section>
<div class="content">
    <main class="productsContainer">
<?php
        if($result->rowCount()>0){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){ echo "
            <form class='productBox' method='post' action=''>
            <img class='productImg' src='".$row['ProductImage']."' />
            <h4 class='productName'>
            ".$row['ProductName']."
            </h4>
            <h4 class='productPrice'>&#163;
            ".$row['ProductPrice']."
            </h4>
            <button type='submit' id='product' class='addBtn' pid='".$row['ProductID']."'>Add To Basket</button>
            </form>
            ";}
        } else {
            echo "No Products Found.";
        }
?>

    </main>
</div>
