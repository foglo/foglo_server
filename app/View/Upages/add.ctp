<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu upages">
	<h1>Créer une Page</h1>
	<?php
		echo $this->Form->create('Upage');

		echo $this->Form->input('Upage.name', array(
			'label' => 'Nom de la page : ',
			));
		echo $this->Form->input('Upage.user_id', array(
			'type' => 'hidden',
			'value' => $user['User']['id']
			));

		echo $this->Form->end('Créer');
	?>
</div>