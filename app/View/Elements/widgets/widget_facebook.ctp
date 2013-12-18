<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
	<div class="title">
		<?php echo $this->Html->image('facebook.png', array('alt' => 'logo facebook', 'class' => 'middle')); ?>
		<h1 class="middle"><a href="<?php echo $infos['link'] ?>"><?php echo $infos['name']; ?></a></h1>
	</div>
	<?php if(isset($posts)): ?>
		<div class="slider sliderkit-panels sliderkit-panels-wrapper">
		<?php
			foreach ($posts as $post) {
			?>
			<div class="sliderkit-panel">
			<?php
				//Si il y a une image à afficher
				if($post['picture']):
				?>
					<div class="img middle">
						<a target="_blank" href="<?php echo $post['link'] ?>">
							<img src="<?php echo $post['picture']; ?>" alt="image du post" class="middle" />
						</a>
						<div class="etai"></div>
					</div>

				<?php endif; ?>
			
				<div class="details middle">
					<a target="_blank" href="<?php echo $post['link'] ?>">
						<h1><?php echo $post['message']; ?></h1>	
						<p><?php echo $post['date']; ?></p>
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