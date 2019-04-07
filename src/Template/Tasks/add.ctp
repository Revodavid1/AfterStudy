<?php
    $allmembers[$this->Session->read('Auth.User.id')] = 'Myself';
?>
<!-- Modal Structure -->
<div id="tasksmodal" class="modal white">
    <div class="modal-content">
        <div class="center">
            <?= $this->Flash->render() ?>
        </div>
        <h4>Add New Task</h4>
        <?= $this->Form->create($newtask)?>
        <div class="row">
            <div class="input-field col s12">
                <?= $this->Form->control(('title'),array('maxlength'=>'50'),['type' => 'text']);?>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false]
                );?>
            </div>
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
    <div class="modal-footer blue-grey">
        <?= $this->Form->button(('Submit'),['class' => 'green waves-effect waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
        <?= $this->Html->link('Cancel',['action' => 'index',$id], ['class'=>'red darken-4 waves-effect waves-light 
                btn-small']
        );?>
    </div>
    <?= $this->Form->end() ?>
</div>
<!-- Modal Structure -->


