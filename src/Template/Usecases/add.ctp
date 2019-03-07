<!-- Modal Structure -->
<div id="projectmodal" class="modal white">
    <div class="modal-content">
        <div class="center">
            <?= $this->Flash->render() ?>
        </div>
        <h4>Add New Use Case</h4>
        <?= $this->Form->create($newusecase)?>
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


