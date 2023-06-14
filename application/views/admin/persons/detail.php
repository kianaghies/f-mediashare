<?php echo anchor('admin/person', 'Back'); ?>
<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?= $person->username ?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?= $person->username ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?= $person->email ?></td>
	</tr>
	<tr>
		<td>Negara</td>
		<td>:</td>
		<td><?= $person->negara ?></td>
	</tr>
	<tr>
		<td>Kota</td>
		<td>:</td>
		<td><?= $person->kota ?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?= $person->tanggal_lahir ?></td>
	</tr>
</table>
