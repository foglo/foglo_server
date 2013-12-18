<div class="box round first grid">
    <h2>Users</h2>
    <div class="block">
        <table class="data display datatable" id="widgets">
			<thead>
				<tr>
					<th class="sorting">id</th>
					<th class="sorting">Prenom</th>
					<th class="sorting">Nom</th>
					<th class="sorting">Email</th>
					<th class="sorting">Modifier</th>
					<th class="sorting">Supprimer</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($users as $user) {
				?>
					<tr>
						<td class="center"><?php echo $user['User']['id']; ?></td>
						<td><?php echo $user['User']['prenom']; ?></td>
						<td><?php echo $user['User']['nom']; ?></td>
						<td><?php echo $user['User']['email']; ?></td>
						<td class="center"><?php echo $this->Html->link('+', array('controller' => 'users', 'action' => 'edition', $user['User']['id'])); ?></td>
						<td class="center"><?php echo $this->Html->link('X', array('controller' => 'users', 'action' => 'supprimer', $user['User']['id'])); ?></td>
					</tr>					
				<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>


<?php
	//debug($widgets);