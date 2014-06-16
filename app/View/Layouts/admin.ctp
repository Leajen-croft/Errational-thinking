<!DOCTYPE HTML>
<html>
	<head>
		<title> <?php echo $title;?></title>
		<link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'/>
		<?php echo $this->Html->css('admin_style');?>
	</head>
	<body>
		<div id="wrapper">
		<section class="left_bar">
			<header>
				<h1 class="replace center">
	  				errational thinking
				</h1>
			</header>
			<nav>
				<ul>
					<li><?php echo $this->Html->link(
    						'Page Edit',
    						array('controller' => 'pages', 'action' => 'index'),array('class'=>'adminNav') 
								); ?></li>
					<li><?php echo $this->Html->link(
						    'Blog Controls',
						    array('controller' => 'Posts', 'action' => 'index'),array('class'=>'adminNav')
								); ?></li>
					<li><?php echo $this->Html->link(
						    'Issue Uploads',
						    array('controller' => 'Article', 'action' => 'index'),array('class'=>'adminNav') 
								); ?></li>
					<li><?php echo $this->Html->link(
						    'Users',
						    array('controller' => 'Users', 'action' => 'index'),array('class'=>'adminNav') 
								); ?></li>
					<li><?php echo $this->Html->link(
						    'Partner Sites',
						    array('controller' => 'Partner', 'action' => 'index'),array('class'=>'adminNav') 
								); ?></li>
				</ul>
		</section>
		<section class="mainContent">
			<div class="log-out">
			<?php echo $this->Html->link(
			    'log out',
			    array('controller' => 'app', 'action' => 'logout')
			); ?>
		</div>
			<?php echo $this->fetch('content'); ?>
		</section>
	</div>
		<footer>
		<p class="footerText"> &copy; Errational Thinking 2014<p>
		</footer>
	</body>
</html>