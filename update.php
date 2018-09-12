<?php
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>
<?php
$db = new Database;
$id = $_GET['id'];
$query = "SELECT * FROM tb_login WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();
//var_dump($getData);
//exit();



if(isset($_POST['btn'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
	if($name == '' || $email == '' || $skill == ''){
		$error = "Field must notbe empty!!";
	}else{
		$query = " UPDATE tb_login
		SET
		name = '$name',
		email = '$email',
		skill = '$skill'
		WHERE id=$id";
		$update = $db->update($query);
	}
}
?>
<?php
if(isset($error)){
	echo "<span style='color:red'>".$error."</span>";
}

?>
<form action="update.php?id=<?php echo $id; ?>" method="POST">
<table class="tblone">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" value="<?php echo $getData['name']; ?>" >
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $getData['email']; ?>" >
			</tr>
			<tr>
				<td>Skill:</td>
				<td><input type="text" name="skill" value="<?php echo $getData['skill']; ?>">
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