<?php
    if(!empty($_GET['y'])){
    
        $_SESSION['y'] = $_GET['y'];
        
        $query2 = 'SELECT * FROM `subcategory` WHERE SubCategoryID = :subCategory';
        $smt2 = $DBH->prepare($query2);
        $smt2->bindParam(':subCategory', $_GET['y']);
        $smt2->execute();
        
        
        
    }else{
        require_once('pages/home.php');
    }

    
?>
    <div class="content">
<div id="msg">
        </div>
    <section class="productBackground">
        <h2>Products > 
                <?php if($smt2->rowCount()>0){
                        while($row2=$smt2->fetch(PDO::FETCH_ASSOC)){
                            echo $row2['SubCategoryName'];
                        }
                }?>
        </h2>
    </section>
        
        <div class="productsSorter">
            <h2 class="searchTitles">Sort By</h2>
            <form name="sort" action="" method="POST">
                <select id="order" name="order">
                    <option class="sortBy" value="ProductName ASC">Sort By</option>
                    <option class="sortBy" value="ProductName ASC">A-Z</option>
                    <option class="sortBy" value="ProductName DESC">Z-A</option>
                    <option class="sortBy" value="ProductPrice DESC">Price (high to low)</option>
                    <option class="sortBy" value="ProductPrice ASC">Price (low to high)</option>
                </select>
            </form>
        </div>
        
        <main id="products" class="productsContainer">
           

        </main>
    </div>
