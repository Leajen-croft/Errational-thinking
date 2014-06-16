<?php //load the front end layout
    $this->layout = 'admin';
$this->set('title', 'Edit');
?>
<h2>Add User</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
echo $this->Form->end('Add User');
echo $this->Html->link(
                    'back to home',
                    array('action' => 'index')
                );
?>