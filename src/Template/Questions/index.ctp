<?php echo $this->element('navextend'); ?>
<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row" style="margin-top:5px;margin-left: 1px;">
    <?= $this->Html->link('Ask a Question','/questions/add', 
        ['class'=>'waves-effect waves-light btn-small blue-grey']);
    ?>
    <?= $this->Html->link('Create Tag','/questions/add', 
        ['class'=>'waves-effect waves-light btn-small blue-grey']);
    ?>
</div>