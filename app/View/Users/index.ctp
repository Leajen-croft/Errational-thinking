<?php //load the front end layout
    $this->layout = 'admin';
$this->set('title', 'Users');
?>
<h2>Users</h2>
<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>
<table>
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>

    <!--cycle through users array and out each users -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?php echo $user['User']['username'];?></td>
            <td><?php
                 echo $this->Html->Link(
                    'Edit',
                    array('action' => 'edit', $user['User']['id'])
                );
                 echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?')
                );?></td>
    </tr>
    <?php endforeach; ?>
</table>