<?php //load the front end layout
    $this->layout = 'errational_main';
    // passes in the title of the page

    $this->set('title', $pages[0]['Page']['title']);
?>
<section class="box left">
<article>
<h2><?php echo $pages[0]['Page']['title'];?></h2>
<p><?php echo nl2br( h($pages[0]['Page']['content']));?></p> 
<?php foreach ($articles as $article): ?>
<div class="issue-container issue-pic"><?php echo $this->Html->image($article['Article']['filename_image'], array(
    "alt" => $article['Article']['title'],));?></div>
    <div class="left">
<h2><?php echo $article['Article']['title'];?></h2> <p>To download please use the link below</p>
<a class="download" href="<?php echo $this->webroot; echo $article['Article']['filename_magazine'];?> ">download</a>
</div>
<?php endforeach; ?>
</article>
</section>