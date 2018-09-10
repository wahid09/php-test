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
		
<table class="tblone">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th width="25%">Name</th>
			<th width="25%">Email</th>
			<th width="25%">Skill</th>
			<th width="25%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if($read) { ?>
			<?php while($row = $read->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><a href="update.php?i=1">Edit</a></td>
		</tr>
	<?php } ?>
	<?php } else{ ?>
		<p>Data is not availabe in here !!</p>
	<?php } ?>
	</tbody>
</table>	
		









		

<?php include 'inc/footer.php'; ?>