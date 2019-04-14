<div class="center">
    <?= $this->Flash->render() ?>
</div>

<div class="row">
    <div class="col s12 m12">
      <div class="card white lighten-5">
        <?= $this->Form->create($newNote)?>
        <div class="card-content black-text">
            <span class="card-title">Work Notes</span>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <?php echo $this->Form->textarea('note',array('type' => 'text',
                                                            'class'=>'browser-default',
                                                            'style'=>'height:300px;max-height:auto;'));
                            ?>
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