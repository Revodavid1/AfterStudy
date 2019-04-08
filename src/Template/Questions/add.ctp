<?php echo $this->element('navextend'); ?>
<div class="center">
    <?= $this->Flash->render() ?>
</div>

<div class="row">
    <div class="col s12 m12">
      <div class="card white lighten-5">
        <?= $this->Form->create($question)?>
        <div class="card-content black-text">
            <span class="card-title">Question Form</span>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12 l6 m6">
                            <?= $this->Form->control('title',array('type' => 'text','class'=>'validate',
                                                    'id'=>'title','data-length'=>'100','maxlength'=>'100'));
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label>Description</label>
                            <?php echo $this->Form->textarea('question',array('type' => 'text',
                                                            'class'=>'materialize-textarea',
                                                            'label'=>'Description'));
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6 m6">
                            <?php echo $this->Form->control('tags._ids', ['options' => $tags]);?>
                        </div>
                        <div class="input-field col s12 l6 m6">
                            <?php echo $this->Form->control('project_id', array('options' => $myprojects,
                            'empty' => _('Choose One'),'label'=>'Project Related'));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-action">
            <?= $this->Form->button(('Submit'),['class' =>'btn waves-effect blue-grey darken-2 white-text 
                                                waves-light'],['type' => 'submit'])?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
</div>