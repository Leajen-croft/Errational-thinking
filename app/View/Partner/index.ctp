<?php //load the front end layout
    $this->layout = 'admin';
    // passes in the title of the page
    $this->set('title', 'Partners');
?>
<article>
    <h2> Add new Partner</h2>
    <?php 
echo $this->Form->create('Partner', array('type'=>'file'));
echo $this->Form->input('name');
echo $this->Form->input('link');
echo $this->Form->input('image',array('type' => 'file'));
echo $this->Form->end('Submit');
?>
<h2>Partners</h2>
<table>
    <tr>
        <th> Name</th>
        <th> Picture</th>
        <th> Actions</th>
    </tr>
	<?php foreach ($partners as $partner): ?>
    <tr>
       <td><?php echo $partner['Partner']['name']; ?></td>
             <td><div class="partner-pic"><?php echo $this->Html->image($partner['Partner']['image'], array(
    "alt" => $partner['Partner']['name'],
));?></div></td>
            <td><?php
                 echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $partner['Partner']['id']),
                    array('confirm' => 'Are you sure?')
                );?> </td>
    </tr>
             <?php endforeach;?>
</table>
</article>