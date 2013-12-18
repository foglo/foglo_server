<div class="page" id="wDropZone" data-upage="<?php echo $upage['Upage']['id'] ?>">
<?php
	$this->Html->script('jquery.autocomplete', array('block' => 'scriptBefore'));
	if(!empty($widgets)){
		foreach($widgets as $widget){
		?>
			<div
				class="widget <?php echo $widget['Widget']['name']; ?> change"
				id="<?php echo $widget['Widget']['id']; ?>"
				<?php if($this->Session->read('Auth.User')): ?>
					draggable="true"
				<?php endif;?>
			>
				<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
				<div class="etai"></div>
			</div>
		<?php
		}
	} else {
		echo '<h1 class="empty middle">Commencez par glisser un widget ici depuis le menu vert</h1>';
		echo '<p class="empty middle">'.$this->Html->image('info-pub/fleche.png', array('alt' => 'fleche')).'</p>'; ?>
		<div class="etai empty"></div>
		<?php
	}

	//Widget ajout nouveau si connecté, sinon callToAction
	if($this->Session->read('Auth.User') != null):
	?>
	<div class="widget widgetAdd">
		<div class="content">
			<button class="gros">Nouveau</button>
			<div class="etai"></div>
		</div>
	</div>
<?php endif; ?>
</div>