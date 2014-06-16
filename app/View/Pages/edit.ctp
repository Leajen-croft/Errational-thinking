<?php //load the front end layout
    $this->layout = 'admin';
$this->set('title', 'Edit'.$page['Page']['title']);
?>
<h2>Edit Page</h2>
<?php
echo $this->Form->create('Page');
echo $this->Form->label('title', 'Page Title');
echo '</br>';
echo $this->Form->text('title');
echo '</br>';
echo $this->Form->label('content','Content on the page');
echo'</br>';
echo $this->Form->textArea('content', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Page');
echo $this->Html->link(
                    'back to home',
                    array('action' => 'index')
                );
?>