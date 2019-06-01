<?php 
include('config/db_connect.php');
 
$title = $yourName = $identification = $qualification = $homeAdd = $occupation = $birthPlace = $birthDate = $phone = $origin  = '';
$error = array('yourName' => '', 'identification' => '', 'qualification' => '', 
'homeAdd' => '', 'occupation' => '', 'birthPlace' => '', 'birthDate' => '', 'phone' => '',
'origin' => '');	

	if(isset($_POST['submit'])) {
		if(empty($_POST['yourName'])){
    $error['yourName'] = 'A name is required <br />';
} else {
   $yourName = $_POST['yourName'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $yourName)){
    $error['yourName'] = 'Name must be letters and spaces only';
}
}

//check IC number
if(empty($_POST['identification'])){
    $error['identification'] = 'An identification is required <br />';
} else {
    $number = $_POST['identification'];
}
    
    if(empty($number)) {
        $error['identification'] = '<span class="error"> Please enter a value</span>';
    } else if(!is_numeric($number)) {
        $error['identification'] = '<span class="error"> Data entered was not numeric</span>';
    } else if(strlen($number) != 12) {
        $error['identification'] = '<span class="error"> The number entered was not 12 digits long</span>';
}


//check qualification
if(empty($_POST['qualification'])){
    $error['qualification'] = 'A qualification is required <br />';
} else {
    $qualification = $_POST['qualification'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $qualification)) {
    $error['qualification'] = 'Name must be letters and spaces only';
}
}



//check alamat
if(empty($_POST['homeAdd'])){
    $error['homeAdd'] = 'An address is required <br />';
}

//check pekerjaan
if(empty($_POST['occupation'])){
    $error['occupation'] = 'An occupation is required <br />';
} else {
    $occupation = $_POST['occupation'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $occupation)){
    $error['occupation'] = 'Occupation must be letters and spaces only';
}
}


//check tarikh lahir
if(empty($_POST['birthDate'])){
    $error['birthDate'] = 'A date is required <br />';
}


//check tempat lahir
if(empty($_POST['birthPlace'])){
    $error['birthPlace'] = 'A place of birth is required <br />';
} else {
    $place = $_POST['birthPlace'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $place)){
    $error['birthPlace'] =  'Place must be letters and spaces only';
}
}

//check phone
if(empty($_POST['phone'])){
    $error['phone'] = 'A phone number is required <br />';
} else {
    $phone = $_POST['phone'];
    if(empty($phone)) {
        $error['phone'] = '<span class="error"> Please enter a value</span>';
    } else if(!is_numeric($phone)) {
        $error['phone'] = '<span class="error"> Data entered was not numeric</span>';
    } else if(strlen($phone) > 10) {
        $error['phone'] = '<span class="error"> The number entered was not 10 digits long</span>';
    }
}


//check origin
if(empty($_POST['origin'])){
    $error['origin'] = 'A place of origin is required <br />';
} else {
    $origin = $_POST['origin'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $origin)){
    $error['origin'] = 'Origin must be letters and spaces only';
}
}

if(array_filter($error)){
	//echo 'Error detected in form';
} else{

	$yourName = mysqli_real_escape_string($conn, $_POST['yourName']);
	$identification = mysqli_real_escape_string($conn, $_POST['identification']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
	$homeAdd = mysqli_real_escape_string($conn, $_POST['homeAdd']);
	$birthPlace= mysqli_real_escape_string($conn, $_POST['birthPlace']);
	$birthDate = mysqli_real_escape_string($conn, $_POST['birthDate']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$origin = mysqli_real_escape_string($conn, $_POST['origin']);


	$sql = "INSERT INTO permai(yourName, identification, qualification, occupation, homeAdd, birthPlace, birthDate, phone, origin) VALUES ('$yourName', '$identification', '$qualification', '$occupation', '$homeAdd','$birthPlace','$birthDate','$phone','$origin')";

	if(mysqli_query($conn, $sql)){
		header('location: index.php?registration successful'); 
	} else {
		echo 'query error:' . mysqli_error($conn);
	}

	
}

}
	
 ?>
<!DOCTYPE html>
 <html>
<?php include('template/header.php'); ?>

<section class="container grey-text">
	<h4 class="center">Permohonan Keahlian</h4>
	<form class="white" action="form.php" method="POST">
		<label>Name</label>
		<Input  type="text" name="yourName" value="<?php echo htmlspecialchars($yourName)?>">
		<div class="red-text"><?php echo $error['yourName'] ?></div>
		<label>Identification</label>
		<Input  type="text" name="identification" value="<?php echo htmlspecialchars($identification) ?>">
		<div class= "red-text"><?php echo $error['identification'] ?></div>
		<label>Qualification</label>
		<Input  type="text" name="qualification" value="<?php echo htmlspecialchars($qualification) ?>">
		<div class="red-text"><?php echo $error['qualification'] ?></div>
		<label>Occupation</label>
		<Input  type="text" name="occupation" value="<?php echo htmlspecialchars($occupation) ?>">
		<div class="red-text"><?php echo $error['occupation'] ?></div>
		<label>Address</label>
		<Input  type="text" name="homeAdd" value="<?php echo htmlspecialchars($homeAdd) ?>">
		<div class="red-text"><?php echo $error['homeAdd'] ?></div>
		<label>Place of Birth</label>
		<Input  type="text" name="birthPlace" value="<?php echo htmlspecialchars($birthPlace) ?>">
		<div class="red-text"><?php echo $error['birthPlace'] ?></div>
		<label>Date of Birth (dd/mm/yy)</label>
		<Input  type="date" name="birthDate" value="<?php echo htmlspecialchars($birthDate) ?>">
		<div class="red-text"><?php echo $error['birthDate'] ?></div>
		<label>Phone No.</label>
		<Input  type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>">
		<div class="red-text"><?php echo $error['phone'] ?></div>
		<label>Origin of Igan</label>
		<Input  type="text" name="origin" value="<?php echo htmlspecialchars($origin) ?>">
		<div class="red-text"><?php echo $error['origin'] ?></div>
		<div class="center">
			<input type="submit" name="submit" value="submit" class="btn brand z-depth-0" onclick="myFunction()">
		</div>
	</form>
	<script type="text/javascript">
		function myFunction() {
			location.replace('index.php');
			alert('Registration Successful');
		}
	</script>
</section>

<?php include('template/footer.php'); ?>

</html>