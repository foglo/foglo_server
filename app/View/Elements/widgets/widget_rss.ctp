<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
	<?php 
		if($flux):
		/*
			$flux = array(
				'title'     => 'Nom du flux Rss',
				'permalink' => 'url vers le site',
				'items'     => array(
					0 => array(
						'date'      => 'Date du Post',
						'permalink' => 'lien vers post',
						'title'     => 'Titre du post',
						'img'       => 'url de la première image ou false si pas d'img'
					),
					...
					5
		 		)
			)
		*/
	?>
		<div class="title">
			<?php echo $this->Html->image('rss.png', array('alt' => 'logo flux rss', 'class' => 'middle')); ?>
			<h1 class="middle"><a href="<?php echo $flux['permalink'] ?>"><?php echo $flux['title']; ?></a></h1>
		</div>

		<div class="slider sliderkit-panels sliderkit-panels-wrapper">
		<?php 
			foreach ($flux['items'] as $i) {
			?>
				<div class="sliderkit-panel">
				<?php
					//Si il y a une image à afficher
					if($i['img']):
				?>
					<div class="img middle">
						<a target="_blank" href="<?php echo $i['permalink'] ?>">
							<img src="<?php echo $i['img']; ?>" alt="image du l'article" class="middle" />
						</a>
						<div class="etai"></div>
					</div>

				<?php endif; ?>

					<div class="details middle">
						<a target="_blank" href="<?php echo $i['permalink'] ?>">
							<h1><?php echo $i['title']; ?></h1>	
							<p><?php echo $i['date']; ?></p>
						</a>
					</div>
					<div class="etai"></div>
				</div>
			<?php
			}
		?>
		</div>

	<?php 
		elseif(isset($error)): 
			echo $this->element('error_widget');
		endif;
	?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>