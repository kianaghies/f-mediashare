<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th class="text-center" width="160px" style="padding-left: 20px;">Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($persons as $p) { ?>
				<tr>
					<td class="text-center" width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $p['username'] ?></td>
					<td><?= $p['nama']?></td>
					<td><?= $p['email']?></td>
					<td><?= $p['negara']?></td>
					<td><?= $p['kota']?></td>
					<td><?= $p['tanggal_lahir']?></td>
					<td class="text-center" width="160px" style="padding-left: 20px;">
						<?php echo anchor('admin/person/detail/' . $p['id'], 'Detail'); ?> |
						<?php echo anchor('admin/person/edit/' . $p['id'], 'Update'); ?> |
						<?php echo anchor('admin/person/delete/' . $p['id'], 'Delete'); ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
