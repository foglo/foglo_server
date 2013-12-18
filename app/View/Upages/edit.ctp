<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu upages">
	<h1>Modifier ma Page</h1>
	<?php
		echo $this->Form->create('Upage');

		echo $this->Form->input('Upage.name', array(
			'label' => 'Nom de la page : ',
			'value' => $upage['Upage']['name']
			));
		echo $this->Form->input('Upage.id', array(
			'type' => 'hidden',
			'value' => $upage['Upage']['id']
			));
		echo $this->Form->input('Upage.user_id', array(
			'type' => 'hidden',
			'value' => $upage['Upage']['user_id']
			));

		echo $this->Form->end('Modifier');
	?>
</div>