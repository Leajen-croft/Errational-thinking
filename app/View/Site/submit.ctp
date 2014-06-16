<?php //load the front end layout
    $this->layout = 'errational_main';
    // passes in the title of the page

    $this->set('title', $pages[0]['Page']['title']);
?>

<section class="box left">
<article>
<h2><?php echo $pages[0]['Page']['title'];?></h2>
<p><?php echo nl2br( h($pages[0]['Page']['content']));?></p> 

</article>
</section>