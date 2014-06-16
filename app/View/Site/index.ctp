<?php //load the front end layout
    $this->layout = 'errational_home';
    // passes in the title of the page

    $this->set('title', $pages[0]['Page']['title']);
?>

<section class="box">
<article>
<h2><?php echo $pages[0]['Page']['title'];?></h2>
<p><?php echo nl2br( h($pages[0]['Page']['content']));?></p> 

</article>
</section>
<section class="box left">
<article>
<h2>Errational Thoughts Blogs</h2>
<?php foreach ($posts as $post): ?>
<h3>	<?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id']),array('class' => array('blog-link','left'))); ?></h3>
    <?php endforeach; ?>
</article>
</section>