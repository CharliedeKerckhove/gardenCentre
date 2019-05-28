<?php 
include('includes/db.php');
include('includes/header.php');

    if(!empty($_GET['p'])){
        require_once('pages/'.$_GET['p'].'.php');
    }else{
        require_once('pages/home.php');
    }

include('includes/footer.php');
?>