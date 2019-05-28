<?php
if(isset($_POST['email']) || isset($_POST['password'])){
	if(!$_POST['email'] || !$_POST['password']){
		$error = "Please enter an email and password";
	}

	else{
		//No errors - lets get the users account
        $query = "SELECT * FROM customers WHERE Email = :email";
		$result = $DBH->prepare($query);
		$result->bindParam(':email', $_POST['email']);
		$result->execute();

		$row = $result->fetch(PDO::FETCH_ASSOC);

		if($row){
		    	//User found - let’s check the password
			if(password_verify($_POST['password'], $row['CustomerPassword'])){
		    		$_SESSION['customerData'] = $row;
                    $_SESSION['loggedin'] = "true";
		    		echo "<script> window.location.assign('index.php?p=home'); </script>";
			}else{
                $error = "Password does not match";
			}
		    	
		}else{
		    	$error = "Email not recognised";
		}

    }
}
?>
<div class="content">
    <h1 class="regTxt">Sign In</h1>
    <form class="regform" action="index.php?p=signin" method="post">
        <?php if(!empty($error)){
        echo '<h2 class="errormsg">Error: '.$error.'<br><br></h2>';} ?>
        <div id="errors"></div>
        <h3>Email</h3>
        <input type="email" class="regInput" name="email" placeholder="Enter Email Address" required>
        <h3>Password</h3>
        <input type="password" class="regInput" name="password" placeholder="Enter Password" required>

        <button type="submit" class="regBtn" id="submitbtn">Sign In</button>
    </form>
    <h1 class="regTxt">New Here?</h1>
    <form class="regform" action="index.php?p=register" method="post">
        <button type="submit" class="regBtn">Click Here to Register</button>
    </form>
</div>
