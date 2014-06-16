<?php //load the front end layout
    $this->layout = 'admin';
    // passes in the tilte of the page
    $this->set('title', 'Add new issue');
?>
<article>

<h2>Add New Issue</h2>
<?php 
echo $this->Form->create('Article', array('type'=>'file'));
echo $this->Form->input('title');
echo $this->Form->input('filename_image',array('type' => 'file'));
echo $this->Form->input('filename_magazine',array('type' => 'file'));
$options = array('Yes' => 'YES', 'No' => 'NO');
echo $this->Form->label('article.current_issue');
echo $this->Form->select('current_issue', $options);
echo $this->Form->end('Submit');
?>
<h2> Current uploaded issues</h2>
<table>
    <tr>
        <th> Issue Title</th>
        <th> Picture</th>
        <th> Actions</th>
    </tr>

 <?php foreach ($articles as $article): ?>
    <tr>
       <td><?php echo $article['Article']['title']; ?></td>
      <td><div class="issue-pic"><?php echo $this->Html->image($article['Article']['filename_image'], array(
    "alt" => $article['Article']['title'],
));?></div></td>
    <!--<a href="<?php // echo $article['Article']['filename_magazine']?>">download</a>-->
            <td><?php
                 echo $this->Html->Link(
                    'Edit',
                    array('action' => 'edit', $article['Article']['id'])
                );
                 echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $article['Article']['id']),
                    array('confirm' => 'Are you sure?')
                );?></td>
    </tr>
             <?php endforeach; ?>
</table>
</article>
