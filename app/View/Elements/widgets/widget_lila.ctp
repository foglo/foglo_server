<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title = "Glissez ce widget sur un autre pour échanger de place."
		<?php endif; ?>
	>
	<?php 
		if(isset($temps)): 
	?>
			<div class="ligne middle">
				<h1 class="middle l<?php echo $ligne ?> ">
					<span>lila</span>
					<?php echo $ligne; ?>
				</h1>
				<div class="etai"></div>
			</div>
		<?php if($temps != false): ?>
			<div class="details middle">
				<ul>
					<?php echo $this->Html->image('arret_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo $arret; ?></li>
				</ul>
				<h1>
					<?php 
						//Si passage dans moins d'une heure, on affiche le temps d'attente en min
						if((strtotime($temps) - time()) < 3600)
						{
							echo (int)((strtotime($temps) - time())/60) . " min";
						}
						//Sinon, affichage sous forme Heure:min
						else
						{
							echo date("H:i", strtotime($temps));
						}
					 ?>
				</h1>
			</div>
		<?php 
			//Pas de temps dispo 
			else:
		?>
			<div class="details middle">
				<ul>
					<?php echo $this->Html->image('arret_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo $arret; ?></li>
				</ul>
				<h3>Probablement pas de passage à cet arrêt avant demain.</h3>
			</div>

		<?php endif; ?>
	<?php 
		elseif(isset($error)): 
			echo $this->element('error_widget');
		endif;
	?>
	<div class="etai"></div>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>