<div class="page">
<?php
	$this->Html->script('jquery.autocomplete', array('block' => 'scriptBefore'));
	if(!empty($widgets)){
		foreach($widgets as $widget){
		?>
			<div
				class="widget change <?php echo $widget['Widget']['name']; ?>"
				id="<?php echo $widget['Widget']['id']; ?>"
			>
				<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
				<div class="etai"></div>
			</div>
		<?php
		}
	}
?>
	<h2>Vous avez besoin de créer votre propre système d'information ? Pensez au compte Premium et à son widget personnalisable.</h2>
</div>