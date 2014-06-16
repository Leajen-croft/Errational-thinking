<!-- File: /app/View/Posts/add.ctp -->
<?php //load the front end layout
    $this->layout = 'admin';
    // passes in the tilte of the page
    $this->set('title', 'Add post');
?>

<h2>Add Post</h2>
<?php


echo $this->Form->create('Post');
echo $this->Form->label('title', 'Blog Title');
echo '</br>';
echo $this->Form->text('title');
echo '</br>';
echo $this->Form->label('body','Blog Post');
echo'</br>';
echo $this->Form->textArea('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
echo $this->Html->link(
                    'back to home',
                    array('action' => 'index')
                );
?>