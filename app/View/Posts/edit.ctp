<?php //load the front end layout
    $this->layout = 'admin';
$this->set('title', 'Edit'.$post['Post']['title']);
?>
<h2>Edit Post</h2>
<?php
echo $this->Form->create('Post');
echo $this->Form->label('title', 'Blog Title');
echo '</br>';
echo $this->Form->text('title');
echo '</br>';
echo $this->Form->label('body','Blog Post');
echo'</br>';
echo $this->Form->textArea('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
echo $this->Html->link(
                    'back to home',
                    array('action' => 'index')
                );
?>