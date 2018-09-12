<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>

<?php
$db = new Database;
$query = "SELECT * FROM tb_login";
$read = $db->select($query);
?>
<?php 
if(isset($_GET['id'])){
$id=$_GET['id'];
$query = "DELETE FROM tb_login WHERE id=$id";
$deleteData = $db->delete($query);
}
?>

<?php
if(isset($_GET['msg'])){
	echo "<span style= 'color:green'>".$_GET['msg']."</span>";
}

?>
		
<table class="tblone">
	<caption>Skill Management Table</caption>
	<thead>
		<tr>
			<th width="10">Sl No</th>
			<th width="20%">Name</th>
			<th width="20%">Email</th>
			<th width="10%">Skill</th>
			<th width="40%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if($read) { ?>
			<?php
			$i=1;
			while($row = $read->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td>
				<a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a>
				<a href="?id=<?php echo urlencode($row['id']); ?>">Delete</a>
			</td>
		</tr>
	<?php } ?>
	<?php } else{ ?>
		<p>Data is not availabe in here !!</p>
	<?php } ?>
	</tbody>
</table>
<a href="create.php">Create</a>	
		









		

<?php include 'inc/footer.php'; ?>