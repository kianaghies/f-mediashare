<?php echo anchor('admin/person', 'Back'); ?>
<form action="<?= base_url('admin/person/create') ?>" method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>Negara</td>
			<td><input type="text" name="negara"></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td><input type="text" name="kota"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input type="date" name="tanggal_lahir"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
