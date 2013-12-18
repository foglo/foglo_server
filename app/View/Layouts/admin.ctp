<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no' />
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?> - foglo</title>
	<?php
		echo $this->Html->css('admin/reset');
		echo $this->Html->css('admin/text');
		echo $this->Html->css('admin/grid');
		echo $this->Html->css('admin/layout');
		echo $this->Html->css('admin/nav');
		echo $this->Html->css('admin/jquery.jqplot.min');

		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('admin/jquery-ui/jquery.ui.core.min');
		echo $this->Html->script('admin/jquery-ui/jquery.ui.widget.min');
		echo $this->Html->script('admin/jquery-ui/jquery.ui.accordion.min');
		echo $this->Html->script('admin/jquery-ui/jquery.effects.core.min');
		echo $this->Html->script('admin/jquery-ui/jquery.effects.slide.min');

		echo $this->Html->script('admin/jqPlot/jquery.jqplot.min');
		echo $this->Html->script('admin/jqPlot/plugins/jqplot.barRenderer.min');
		echo $this->Html->script('admin/jqPlot/plugins/jqplot.pieRenderer.min');
		echo $this->Html->script('admin/jqPlot/plugins/jqplot.categoryAxisRenderer.min');
		echo $this->Html->script('admin/jqPlot/plugins/jqplot.highlighter.min');
		echo $this->Html->script('admin/jqPlot/plugins/jqplot.pointLabels.min');

		echo $this->Html->script('admin/setup.js');
	?>
	    <script type="text/javascript">
	        $(document).ready(function () {
	            setupDashboardChart('chart1');
	            setupLeftMenu();
				setSidebarHeight();
	        });
	    </script>
	</head>
	<body>
	    <div class="container_12">
		<?php 
			echo $this->element('admin_header'); 
			echo $this->element('admin_topbar'); 
			echo $this->element('admin_sidebar'); 
		?>
			<div class="grid_10">
			<?php
				echo $this->Session->flash();
				echo $this->Session->flash('auth');

				echo $this->fetch('content');
			?>
			</div>
			<div class="clear"></div>
		</div>
	    <div id="site_info">
	        <p>
	            Admin foglo
	        </p>
   		</div>
	</body>
</html>