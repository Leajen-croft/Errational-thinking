<section class="box blackBg">  
 <div id="mc_embed_signup">
<form action="http://errationalthinkingmagazine.us6.list-manage.com/subscribe/post?u=613245de9fc1f42876cae3c7e&amp;id=327d233fce" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
	<h2 class="whiteTxt">Subscribe to our Newsletter</h2>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="submit-button">
</form>
</div>
</section>
<section class ="box">
	<div class="center">
<h2>Latest Issue</h2>
<?php foreach ($articles as $article): ?>
<div class="issue-pic"><a href="<?php echo $this->webroot; echo $article['Article']['filename_magazine'];?> "><?php echo $this->Html->image($article['Article']['filename_image'], array(
    "alt" => $article['Article']['title'],
));?></a></div>

<?php endforeach?>
</div>
</section>