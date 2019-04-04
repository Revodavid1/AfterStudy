<!-- Modal Structure -->
<div id="projectmodal" class="modal white">
    <div class="modal-content">
        <div class="center">
            <?= $this->Flash->render() ?>
        </div>
        <h4>Create New Group Project</h4>
        <?= $this->Form->create($groupproject)?>
        <div class="row">
            <div class="input-field col s12">
                <?= $this->Form->control(('short_title'),array('maxlength'=>'50'),['type' => 'text']);?>
            </div>
        </div>
        <div class="row">
            <div class="col s12 browser-default">
                <?= $this->Form->input('type', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['School' => 'School', 'Personal' => 'Personal', 'Work' => 'Work'],
                    'empty' => '(choose one)'),
                );?>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <?= $this->Form->control('description', ['type' => 'textarea', 'escape' => false]
                );?>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                 <?= $this->Form->input('link',array('label'=>'Supporting URL (Documents, Source Code, etc)'),
                 ['type'=>'text']);?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <?= $this->form->control('proposed_start_date',array('class'=>'datepicker','type'=>'text','label'=>
                    'Proposed Start Date')); ?>
            </div>
            <div class="input-field col s4">
                <?= $this->form->control('proposed_end_date',array('class'=>'datepicker','type'=>'text','label'=>
                    'Proposed End Date')); ?>
            </div>
            <div class="input-field col s4">
                <?= $this->form->control('last_date_apply',array('class'=>'datepicker','type'=>'text','label'=>
                        'Last Day to Apply')); ?>
            </div>
        </div>
    
        <div class="row">
            <div class="col s6 center browser-default">
                <?= $this->Form->input('want_sponsors', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['Yes' => 'Yes', 'No' => 'No'],
                    'empty' => '(choose one)',
                    'label'=>'Want this Project to be searchable by external sponsors?'),
                );?>
            </div>
        </div>
    </div>
    <div class="modal-footer blue-grey">
        <?= $this->Form->button(('Submit'),['class' => 'green waves-effect waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
        <?= $this->Html->link('Cancel',$this->request->referer(), ['class'=>'red darken-4 waves-effect waves-light 
                btn-small']
        );?>
    </div>
    <?= $this->Form->end() ?>
</div>
<!-- Modal Structure -->


