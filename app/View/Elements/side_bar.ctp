<section class="box blackBg">
 <div class="center">
 	<h2 class="whiteTxt">Social Links</h2>
  <a href="mailto:errational.thoughts@gmail.com"><div title="Code: 0xe803" class="icons whiteTxt"><div class="icon-mail-alt"></div></div></a>
  <a href="https://www.facebook.com/ErrationalThinking"><div title="Code: 0xe800" class="icons whiteTxt"><div class="icon-facebook-squared"></div></div></a>
  <a href="http://errationalthinking.tumblr.com/"><div title="Code: 0xe802" class="icons whiteTxt"><div class="icon-tumblr-squared"></div></div></a>
  <a href="https://twitter.com/ErrationalThink"><div title="Code: 0xe801" class="icons whiteTxt"><div class="icon-twitter-squared"></div></div></a>
    </div>
</section>
<section class ="box">
	<div class="center">
<h2>Friends of Errational Thinking</h2>
<?php foreach ($partners as $partner): ?>
<div class="partner"><a href="<?php echo $partner['Partner']['link'];?>"><?php echo $this->Html->image($partner['Partner']['image'], array(
    "alt" => $partner['Partner']['name'],
));?></a></div>
<?php endforeach?>
</div>
</section>