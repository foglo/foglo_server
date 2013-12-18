<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu upages">
	<h1>Mes Pages</h1>
	<table>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Widgets</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach ($upages as $upage) {
			?>
				<tr id="<?php echo $upage['Upage']['id'] ?>">
					<td><?php echo $upage['Upage']['name'] ?></td>
					<td><?php echo count($upage['Widget']) ?></td>
				<?php if($upage['Upage']['name'] != 'Accueil'): ?>
					<td>
						<?php echo $this->Html->link('Modifier', array('controller' => 'upages', 'action' => 'edit', $upage['Upage']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link('Supprimer', array('controller' => 'upages', 'action' => 'delete', $upage['Upage']['id']), array(), "Êtes-vous certain de vouloir supprimer cette page et l'ensemble de ses widgets ?"); ?>
					</td>
				<?php else: ?>
					<td></td>
					<td></td>
				<?php endif; ?>
				</tr>
			<?php
			}
		?>
		</tbody>
	</table>
	<?php
		echo $this->Form->create('Upage', array('controller' => 'upages', 'action' => 'add'));

		echo $this->Form->input('Upage.name', array(
			'label' => 'Nouvelle page : ',
			));
		echo $this->Form->input('Upage.user_id', array(
			'type' => 'hidden',
			'value' => $user['User']['id']
			));

		echo $this->Form->end('Créer');
	?>
</div>
<div class="cb"></div>
<?php
	//debug($upages);
