<!-- Modal Structure -->
<div id="projectmodal" class="modal white">
    <div class="modal-content">
        <div class="center">
            <?= $this->Flash->render() ?>
        </div>
        <h4>Create a New Project</h4>
        <?= $this->Form->create($project)?>
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
            <div class="input-field col s12">
                <?= $this->form->control('collaborators', array('type'=>'number',
                    'label'=>'How many people do you want to colloborate with you on this project?',
                    'value'=>'0')); ?>
            </div>
        </div>
        <div class="row">
            <?= $this->form->label('Select skills of collaborators (Hold ctrl to select muliple)');?>
        </div>
        <div class="row">
                <div  class="col s6">
                    <input type="text" id="skillInput" onkeyup="filterSkills()" placeholder="Filter skills list..">
                </div>
            <div class="col s6">
                <?= $this->Form->input('skills._ids', array('type'=>'select','options'=>$allskills,
                'multiple' => true, 'size'=>10,'class'=>'browser-default', 'style'=>'height:auto',
                'label'=>false,'id'=>'skillsid')
                );?>
            </div>
        </div>
        <div class="row">
            <div class="col s6 center browser-default">
                <?= $this->Form->input('privacy', array('type' => 'select','id'=>'privacy', 
                    'class'=>'browser-default','options'=>
                        ['All' => 'Share to All', 'Private'=>'Only Me Can See This Project'
                        , 'Group'=>'Share to a Group'],
                    'empty' => '(choose one)','onchange'=>"showSelect('mygroups', this)"),
                );?>
            </div>
            <div class="col s6" id='mygroups'>
                <?= $this->Form->input('group_id', array('type'=>'select','options'=>$mygroups,
                'class'=>'browser-default', 'label'=>'Group')
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


