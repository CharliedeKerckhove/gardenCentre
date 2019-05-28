<?php
if(isset($_POST['email']) || isset($_POST['password'])){
    //check all fields are completed
	if(!$_POST['fname'] || !$_POST['lname'] || !$_POST['phone'] || !$_POST['email'] || !$_POST['password']){
		$error = "Please complete ALL fields";
	}
    //check names only contain letters and white space
    else if(!preg_match("/^[a-zA-Z ]*$/", $_POST['fname']) || !preg_match("/^[a-zA-Z ]*$/", $_POST['lname'])){
        $error = "Only letters and spaces allowed in name fields";
    }
    //check email is valid
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email";
    }
    //check phone number only contains numbers
    else if(!preg_match("/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/", $_POST['phone'])){
        $error = "Invalid phone number";
    }
    //check password is longer than 5 characters
    else if(strlen($_POST['password']) < 5){
        $error = "Your password is too short";
    }
    //No errors account can be created
	else {
	//Encrypt the password with default salt
	$encryptedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
	//Insert to database
	$query = "INSERT INTO customers (CustomerID, FirstName, LastName, PhoneNumber, Email, Address, Postcode, CustomerPassword) VALUES (NULL, :fname, :lname, :phone, :email, :address, :postcode, :password)";
	$result = $DBH->prepare($query);
	$result->bindParam(':fname', $_POST['fname']);
	$result->bindParam(':lname', $_POST['lname']);
	$result->bindParam(':phone', $_POST['phone']);
	$result->bindParam(':email', $_POST['email']);
	$result->bindParam(':address', $_POST['address']);
	$result->bindParam(':postcode', $_POST['postcode']);
	$result->bindParam(':password', $encryptedPass);
    $result->execute();


    echo "<script> window.location.assign('index.php?p=signin'); </script>";
    }


}

?>
<div class = "content">
<h1 class="regTxt">Register</h1>
	<form class="regform" action="index.php?p=register" method="post">
        <?php if(!empty($error)){
        echo '<h2 class="errormsg">Error: '.$error.'</h2>';} ?>
        <div id = "errors"></div>
        <h3>First Name</h3>
            <input type = "text" class = "regInput" name = "fname" placeholder = "Enter First Name" required>
        <h3>Last Name</h3>
            <input type = "text" class = "regInput" name = "lname" placeholder = "Enter Last Name" required>
        <h3>Phone Number</h3>
            <input type = "text" class = "regInput" name = "phone" placeholder = "Enter Phone Number" required>
        <h3>Email</h3>
            <input type = "email" class = "regInput" name = "email" placeholder = "Enter Email Address" required>
        <h3>Address</h3>
            <input type = "text" class = "regInput" name = "address" placeholder = "Enter Address" required>
        <h3>Postcode</h3>
            <input type = "text" class = "regInput" name = "postcode" placeholder = "Enter Postcode" required>
        <h3>Password</h3>
            <input type = "password" class = "regInput" name = "password" placeholder = "Enter Password" required>

        <button type = "submit" class = "regBtn" id = "submitbtn">Register</button>
	</form>
</div>