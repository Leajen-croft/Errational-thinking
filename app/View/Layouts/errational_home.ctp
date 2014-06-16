<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php $this->Html->meta('icon', $this->Html->url('/favicon.ico'));?>
<title><?php echo $title; ?></title>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css' />
<?php echo $this->Html->css('style');?>
<?php echo $this->Html->css('fontello');?>
<!-- google analitics script -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37151256-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
<script type="text/javascript">
function toggleContent() {
  // Get the DOM reference
  var contentId = document.getElementById("toggle");
  // Toggle 
  contentId.style.height == "150px" ? contentId.style.height = "450px" : 
contentId.style.height = "150px"; 
}
</script>
</head>
<body>

<header id="toggle" style="height:150px;"><!--height has to be put in style as JavaScript cahnges it in style-->
<h1 class="logo_replace">Errational Thinking</h1><!--button to toggle nav--><button class="button" onclick="toggleContent()">&#9776;</button>
<nav>
<ul>
<li><?php echo $this->Html->link(
    						'Home',
    						array('controller' => 'site', 'action' => 'index') 
								); ?></li><li class="diamond">&diams;</li>
<li><?php echo $this->Html->link(
    						'About',
    						array('controller' => 'site', 'action' => 'about') 
								); ?></li><li class="diamond">&diams;</li>
<li><?php echo $this->Html->link(
    						'Archive',
    						array('controller' => 'site', 'action' => 'archive') 
								); ?></li><li class="diamond">&diams;</li>
<li><?php echo $this->Html->link(
    						'Submit',
    						array('controller' => 'site', 'action' => 'submit') 
								); ?></li><li class="diamond">&diams;</li>
<li><?php echo $this->Html->link(
    						'FAQ',
    						array('controller' => 'site', 'action' => 'faq') 
								); ?></li>
</ul>
</nav>
</header>
<div id="wrapper">
<!-- Here's where I want my views to be displayed -->

<?php echo $this->fetch('content'); ?>
<div class="right">
<?php echo $this->element('side_bar_home');?>
</div>
</div>
<footer>
<p class="whiteTxt"> &copy; Errational Thinking 2014<p>
</footer>
</body>
</html>