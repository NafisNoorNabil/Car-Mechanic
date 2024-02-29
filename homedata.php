<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');

// we need to check if the input in the form textfields are not empty
if(isset($_POST['name']) && isset($_POST['license']) && isset($_POST['carcolor']) && isset($_POST['engine'])&& isset($_POST['phone'])&& isset($_POST['date'])){
	// write the query to check if this username and password exists in our database
	$name = $_POST['name'];
	$license = $_POST['license'];
	$carcolor= $_POST['carcolor'];
	$engine = $_POST['engine'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
	$mechanicname=$_POST['mechanicname'];

	
	$query= mysqli_query($conn, "select *from booking where license='$license'");
	
	if (mysqli_num_rows($query)>0){
		?>
		<script>
		alert("Already Booked");
		</script>
		<?php
	}

	else{
		$sql = " INSERT INTO booking VALUES( '$name ', '$license', '$carcolor', '$engine','$phone','$date','$mechanicname' ) ";
		
		//Execute the query 
		$result = mysqli_query($conn, $sql);
		$sql= "UPDATE mechanic SET carcount = carcount + 1 WHERE name = '$mechanicname'";
		$result = mysqli_query($conn, $sql);
		
		//check if this insertion is happening in the database
		if(mysqli_affected_rows($conn)){
			
			header("Location: thankyou.php");
		}
		else{
			header("Location: home.php");

		}
	}
}
?>




