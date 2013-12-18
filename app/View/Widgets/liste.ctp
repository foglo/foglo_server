<div class="box round first grid">
    <h2>Widgets</h2>
    <div class="block">
        <table class="data display datatable" id="widgets">
			<thead>
				<tr>
					<th class="sorting">id</th>
					<th class="sorting">Type</th>
					<th class="sorting">Utilisateur</th>
					<th class="sorting">Modifier</th>
					<th class="sorting">Supprimer</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($widgets as $widget) {
				?>
					<tr>
						<td class="center"><?php echo $widget['Widget']['id']; ?></td>
						<td><?php echo $widget['Widget']['name']; ?></td>
						<td><?php echo $widget['User']['email']; ?></td>
						<td class="center"><?php echo $this->Html->link('+', array('controller' => 'widgets', 'action' => 'edition', $widget['Widget']['id'])); ?></td>
						<td class="center"><?php echo $this->Html->link('X', array('controller' => 'widgets', 'action' => 'supprimer', $widget['Widget']['id'])); ?></td>
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