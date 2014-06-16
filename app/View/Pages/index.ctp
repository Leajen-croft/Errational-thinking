<!-- File: /app/View/Posts/index.ctp -->
<?php //load the front end layout
    $this->layout = 'admin';
    // passes in the tilte of the page
    $this->set('title', 'index');
?>

<article>
<h2>Pages of Errational Thinking</h2>

<p>In the table below are the Errational Thinking pages that you can edit or delete.</p>
<table>
    <tr>
        <th>Title</th>
        <th>Actions</th>
    </tr>

    <!-- Here is where we loop through our $pages array, printing out post info -->

    <?php foreach ($pages as $page): ?>
    <tr>
            <td><?php echo $page['Page']['title'];?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $page['Page']['id'])
                );
                
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</article>
</section>