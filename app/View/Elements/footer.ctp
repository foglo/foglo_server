<footer>
	<div>
		<p class="middle">
			<?php 
				echo $this->Html->link( 
						$this->Html->image('logo_footer.png', array('alt' => 'logo')),
						array('controller' => 'widgets'),
						array('escape' => false, 'class' => 'img middle')
					); 
			?>
		</p>
		<p class="middle">
			<?php
				echo $this->Html->link('A propos', array('controller' => 'pages', 'action' => 'display', 'about'));
				echo $this->Html->link('Blog', array('controller' => 'blog'));
				echo $this->Html->link('Contact', array('controller' => 'contacts', 'action' => 'index'));
			?>
			<br /><br />
			Suivez-nous sur : <a href="http://www.facebook.com/foglo">Facebook</a><a href="https://twitter.com/#!/foglo_nantes">Twitter</a><a href="https://plus.google.com/b/117506316819967690343/">Google +</a>
		</p>
	</div>
	<div>

		<p class="middle">Copyright © <a href="http://wuips.com">Wuip's</a> - Tous droits réservés
		<?php
			if($this->Session->read('Auth.User.group_id') == 1)
				echo '<br />'.$this->Html->link('Administration', array('controller' => 'users', 'action' => 'liste'));
		?>
		</p>
		<p class="middle">
			<?php echo $this->Html->link('Plan du site', array('controller' => 'pages', 'action' => 'display', 'plan'));?> &nbsp;-&nbsp; 
			<?php echo $this->Html->link('CGU', array('controller' => 'pages', 'action' => 'display', 'cgu'));?>  &nbsp;&nbsp;| &nbsp;&nbsp;
			<a href="http://nantes.fr">Ville de Nantes</a> &nbsp;-&nbsp; <a href="http://data.nantes.fr">Open Data Nantais</a></p>
	</div>
</footer>
<div id="fb-root"></div>
<?php echo $this->Html->script('jquery.qtip.min'); ?>