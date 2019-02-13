<!-- Modal Structure -->
<div id="projectmodal" class="modal white">
    <div class="modal-content">
        <div class="center">
            <?= $this->Flash->render() ?>
        </div>
        <h4>Edit Project</h4>
        <?= $this->Form->create($project)?>
        <div class="row">
            <div class="col s6 center browser-default">
                <?= $this->Form->input('status', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['Open' => 'Open', 'In Progress'=>'In Progress','Closed'=>'Closed'],
                    'empty' => '(choose one)'),
                );?>
            </div>
        </div>
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
                <?= $this->Form->control('proposed_start_date',array('class'=>'datepicker','type'=>'text','label'=>
                    'Proposed Start Date')); ?>
            </div>
            <div class="input-field col s4">
                <?= $this->Form->control('proposed_end_date',array('class'=>'datepicker','type'=>'text','label'=>
                    'Proposed End Date')); ?>
            </div>
            <div class="input-field col s4">
                <?= $this->Form->control('last_date_apply',array('class'=>'datepicker','type'=>'text','label'=>
                        'Last Day to Apply')); ?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <?= $this->Form->control(('collaborators'),array('label'=>
                    'How many people do you want to colloborate with you on this project?'),
                    ['type'=>'number']); ?>
            </div>
        </div>
        <div class="row">
            <?= $this->form->label('Choose upto 3 skills you are looking for');?>
        </div>
        <div class="row">
            <div class="col s4 center browser-default">
                <?= $this->Form->input('skills_1', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['CakePHP' => 'CakePHP', 'MySQL' => 'MySQL', 'HTML' => 'HTML'],
                    'empty' => '(choose one)'),
                );?>
            </div>
            <div class="col s4 center browser-default">
                <?= $this->Form->input('skills_2', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['CakePHP' => 'CakePHP', 'MySQL' => 'MySQL', 'HTML' => 'HTML'],
                    'empty' => '(choose one)'),
                );?>
            </div>
            <div class="col s4 center browser-default">
                <?= $this->Form->input('skills_3', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['CakePHP' => 'CakePHP', 'MySQL' => 'MySQL', 'HTML' => 'HTML'],
                    'empty' => '(choose one)'),
                );?>
            </div>
        </div>
        <div class="row">
            <div class="col s6 center browser-default">
                <?= $this->Form->input('privacy', array('type' => 'select', 
                    'class'=>'browser-default','options'=>
                        ['All' => 'Share to all groups', 'Private'=>'Only Me Can See This Project'],
                    'empty' => '(choose one)'),
                );?>
            </div>
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
        <?= $this->Form->button(('Submit'),['class' => 'waves-effect waves-green btn-flat white-text'],
            ['type' => 'submit'])?>
        <?= $this->Html->link('Cancel','/projects/index', ['class'=>'red darken-4 waves-effect waves-light 
                btn-small']
        );?>
    </div>
    <?= $this->Form->end() ?>
</div>
<!-- Modal Structure -->