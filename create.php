<?php
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$db = new Database;
if(isset($_POST['btn'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
	if($name == '' || $email == '' || $skill == ''){
		$error = "Field must notbe empty!!";
	}else{
		$query = "INSERT INTO tb_login(name, email, skill)VALUES('$name', '$email', '$skill')";
		$create = $db->insert($query);
	}
}
?>
<?php
if(isset($error)){
	echo "<span style='color:red'>".$error."</span>";
}

?>
<form action="create.php" method="POST">
<table class="tblone">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" placeholder="Enter your namr" >
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" placeholder="Enter your email" >
			</tr>
			<tr>
				<td>Skill:</td>
				<td><input type="text" name="skill" placeholder="Enter your namr" >
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="btn" value="Submit">
						<input type="reset" value="reset">
					</td>

				</tr>
			</table>
		</form>
			<a href="index.php">Home</a>
			
			
			<?php include 'inc/footer.php'; ?>