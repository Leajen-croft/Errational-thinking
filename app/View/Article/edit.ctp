<?php //load the front end layout
    $this->layout = 'admin';
$this->set('title', 'Edit');
?>
<h1>Edit Issue</h1>
<?php
echo $this->Form->create('Article',array('type' => 'file'));
echo $this->Form->input('title');
echo $this->Form->input('filename_image',array('type' => 'file'));
echo $this->Form->input('filename_magazine',array('type' => 'file'));
$options = array('Yes' => 'YES', 'No' => 'NO');
echo $this->Form->label('article.current_issue');
echo $this->Form->select('current_issue', $options);
echo $this->Form->end('Update');
echo $this->Html->link(
                    'back to home',
                    array('action' => 'index')
                );
?>