<thead>
	<tr>
		<th>Todo</th>
		<th>Created</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($data as $key): ?>
		<tr>
			<td><?= $key['todo'] ?></td>
			<td><?= $key['updated_at'] ?></td>
		</tr>
	<?php endforeach ?>
</tbody>