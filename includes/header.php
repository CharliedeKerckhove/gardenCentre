<?php
    $query1 ='SELECT * FROM `subcategory` WHERE CategoryID = 1';
    $smt1 = $DBH->prepare($query1);
    $smt1->execute();

    $query2 ='SELECT * FROM `subcategory` WHERE CategoryID = 2';
    $smt2 = $DBH->prepare($query2);
    $smt2->execute();

    $query3 ='SELECT * FROM `subcategory` WHERE CategoryID = 3';
    $smt3 = $DBH->prepare($query3);
    $smt3->execute();

    $query4 ='SELECT * FROM `subcategory` WHERE CategoryID = 4';
    $smt4 = $DBH->prepare($query4);
    $smt4->execute();

    $query5 ='SELECT * FROM `subcategory` WHERE CategoryID = 5';
    $smt5 = $DBH->prepare($query5);
    $smt5->execute();

    $query6 ='SELECT * FROM `subcategory` WHERE CategoryID = 6';
    $smt6 = $DBH->prepare($query6);
    $smt6->execute();

    $query7 ='SELECT * FROM `subcategory` WHERE CategoryID = 7';
    $smt7 = $DBH->prepare($query7);
    $smt7->execute();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/index.css">

    <title>Garden centre</title>
</head>

<body>
    <section class="navigationTop">
        <div class="nav-container2">
            <nav>
                <ul class="nav-list2">
                    <div class="brand">
                        <a href="index.php?p=home">
                            <img id="dLogo" class="logo" alt="gardenCentre" src="images/logo.png" />
                        </a>
                    </div>

                    <form class="searchCont" action="index.php?p=search" method="POST">
                        <input class="searchBar" type="text" placeholder="Search for products" id="searchInput" name="search">
                        <button class="headerIcons" type="submit" id="searchBtn"  name="submitSearch">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                    <div class="cart">
                        <a class="checkout" href="index.php?p=checkout">
                            <button class="checkoutTxt">
                                Checkout
                            </button>
                            <button class="headerIcons">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </a>
                    </div>
                </ul>
            </nav>
        </div>
    </section>
    <section class="navigation">
        <div class="nav-container">



            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="#!">Plants &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt1->rowCount()>0){while($row=$smt1->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row['SubCategoryID']; ?>">
                                    <?php echo $row['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Pets &#38; Wildlife &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt2->rowCount()>0){while($row2=$smt2->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row2['SubCategoryID']; ?>">
                                    <?php echo $row2['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Homeware &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt3->rowCount()>0){while($row3=$smt3->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row3['SubCategoryID']; ?>">
                                    <?php echo $row3['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Furniture &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt4->rowCount()>0){while($row4=$smt4->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row4['SubCategoryID']; ?>">
                                    <?php echo $row4['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Gardening &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt5->rowCount()>0){while($row5=$smt5->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row5['SubCategoryID']; ?>">
                                    <?php echo $row5['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">Cards &#38; Gifts &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt6->rowCount()>0){while($row6=$smt6->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row6['SubCategoryID']; ?>">
                                    <?php echo $row6['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#!">BBQs &#9660;</a>
                        <ul class="nav-dropdown">
                            <?php
                            if($smt7->rowCount()>0){while($row7=$smt7->fetch(PDO::FETCH_ASSOC)){ ?>
                            <li>
                                <a href="index.php?p=products&y=<?php echo $row7['SubCategoryID']; ?>">
                                    <?php echo $row7['SubCategoryName']; ?>
                                </a>
                            </li>
                            <?php }}else {echo "Failure";} ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="navigationBottom">
        <div class="nav-container2">
            <nav>
                <ul class="nav-list2">
                    <li>
                        <a class="a2" href="#!">Resize Text 
                            <button id="txtDecrease" class="txtResize">A-</button>
                            <button id="txtNorm" class="txtResize">A </button>
                            <button id="txtIncrease" class="txtResize">A+</button>
                        </a>
                    </li>
                    <li>
                        <a class="a2" href="index.php?p=home">Return Home </a>
                    </li>
                    <li>
                        <?php if(!empty($_SESSION['loggedin'])){ echo 
                        "<a class='a2' href='index.php?p=signout'>Sign Out </a>";
                                                               }else{ echo
                        "<a class='a2' href='index.php?p=signin'>Sign In </a>";
                        }?>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <div class="brand">
        <a href="index.php?p=home">
            <img id="logo" class="logo" alt="gardenCentre" src="images/logoWhite.png" />
        </a>
    </div>
    <a class="checkout" href="index.php?p=checkout">
        <button id="cart" class="headerIcons" type="submit">
            <i class="fa fa-shopping-cart"></i>
        </button>
    </a>
    <div class="btnContainer">
        <div class="resizeDrop">
            <button class="headerIcons" type="submit">
                <span class="a2">Resize Text</span>
            </button>
            <div class="resizeDropContent">
                <div class="styleDrop">
                    <a id="txtResizeM" class="txtResize">A-</a>
                    <a id="txtResizeL" class="txtResize">A</a>
                    <a id="txtResizeXL" class="txtResize">A+</a>
                </div>
            </div>
        </div>
        <a href="index.php?p=home" class="headerIcons" type="submit">
            <span class="a2">Return Home </span>
        </a>
         <?php if(!empty($_SESSION['loggedin'])){ echo 
            "<a href='index.php?p=signout' class='headerIcons' type='submit'>
            <span class='a2'>Sign Out </span>
            </a>";
                                                   }else{ echo
            "<a href='index.php?p=signin' class='headerIcons' type='submit'>
            <span class='a2'>Sign In </span>
            </a>";
        }?>
    </div>
    <form id="searchCont" class="searchCont" action="index.php?p=search" method="POST">
        <input class="searchBar" id="searchInput" type="text" placeholder="Search for products">
        <button class="headerIcons" id="searchBtn" type="submit" name="search">
            <i class="fa fa-search"></i>
        </button>
    </form>
