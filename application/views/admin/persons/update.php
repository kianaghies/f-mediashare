<?php echo anchor('admin/home', 'Back'); ?>
<form action="<?= base_url('admin/person/update') ?>" method="post">
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?= $person->nama ?>"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="<?= $person->username ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?= $person->email ?>"></td>
		</tr>
		<tr>
			<td>Negara</td>
			<td><input type="text" name="negara" value="<?= $person->negara ?>"></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td><input type="text" name="kota" value="<?= $person->kota ?>"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input type="date" name="tanggal_lahir" value="<?= $person->tanggal_lahir ?>"></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="id" value="<?= $person->id ?>">
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
