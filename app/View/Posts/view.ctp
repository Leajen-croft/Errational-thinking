<!-- File: /app/View/Posts/view.ctp -->
<?php //load the front end layout
    $this->layout = 'errational_main';
    // passes in the tilte of the page
    $this->set('title', 'index');
?>
<section class="box left">
<article>
<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo nl2br( h($post['Post']['body'])); ?></p>
</article>
</section>