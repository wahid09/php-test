<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>

<?php
$db = new Database;
$query = "SELECT DISTINCT name, email, skill FROM tb_login";
$read = $db->select($query);

?>

<?php
if(isset($_GET['msg'])){
	echo "<span style= 'color:red'>".$_GET['msg']."</span>";
}

?>
		
<table class="tblone">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th width="35%">Name</th>
			<th width="20%">Email</th>
			<th width="15%">Skill</th>
			<th width="30%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if($read) { ?>
			<?php while($row = $read->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
		</tr>
	<?php } ?>
	<?php } else{ ?>
		<p>Data is not availabe in here !!</p>
	<?php } ?>
	</tbody>
</table>
<a href="create.php">Create</a>	
		









		

<?php include 'inc/footer.php'; ?>