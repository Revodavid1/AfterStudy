<?php
$allmembers[$this->Session->read('Auth.User.id')] = 'Myself';
?>

<div class="card white" style="padding: 15px;">
    <div class="center">
        <?= $this->Flash->render() ?>
    </div>
    <h4>Edit Task</h4>
    <?= $this->Form->create($edittask)?>
        <div class="row">
            <div class="input-field col s6">
                <?= $this->Form->control(('title'),array('maxlength'=>'50'),['type' => 'text']);?>
            </div>
            <div class="input-field col s6">
                <?= $this->Form->control(('description'),array('class'=>'materialize-textarea'), 
                ['type' => 'textarea', 'escape' => false]
                );?>
            </div>
        </div>
        <div class="row">
            
        </div>
        <div class="row">
            <div class="input-field col s12 l6 m6">
                <?= $this->Form->control('time_start',array('class'=>'datepicker','type'=>'text','label'=>
                    'Start Date')); ?>
            </div>
            <div class="input-field col s12 l6 m6">
                <?= $this->Form->control('time_end',array('class'=>'datepicker','type'=>'text','label'=>
                    'End Date')); ?>
            </div>
        </div>
        <div class="row">
            <div  class="col s6">
                <?= $this->Form->input('taskgroup_id', array('type'=>'select','options'=>$alltasksgroups,
                'empty' => 'None','class'=>'browser-default','label'=>'Add to Task Group:'));
                ?>    
            </div>
            <div class="col s6">
                <?= $this->Form->input('assigned_to', array('type'=>'select','options'=>$allmembers,
                'empty' => '(choose one)','class'=>'browser-default','label'=>'Assign to:'));
                ?>
            </div>
        </div>
    </div>
    <div class="row blue-grey">
        <?= $this->Form->button(('Submit'),['class' => 'green waves-effect waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
        <?= $this->Html->link('Cancel',['action' => 'createdlist',$id], 
        ['class'=>'red darken-4 waves-effect waves-light 
                btn-small']
        );?>
    </div>
    <?= $this->Form->end() ?>
</div>

