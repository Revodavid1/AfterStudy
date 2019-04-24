<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row">
    <div class="col s12">
       <div class="card">
            <div class="card-content">
                <span class="card-title black-text center">Edit Account</span>
                <?= $this->Form->create($edituser)?>
                    <div class="row">
                        <div class="input-field col s12 l6 m6">
                            <div class="col s2">
                                <i class="material-icons prefix">account_circle</i>
                            </div>
                            <div class="col s10">
                                <?= $this->Form->control(('fullname'),['type' => 'text']);?>
                            </div>
                        </div>
                        <div class="input-field col s12 l6 m6">
                            <div class="col s2">
                                <i class="material-icons prefix">phone</i>
                            </div>
                            <div class="col s10">
                                <?= $this->Form->input('phone',array('maxlength'=>'10'),['type'=>'tel']);?>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <?= $this->Form->button(('Submit'),['class' =>'btn waves-effect blue-grey darken-2 white-text 
                            waves-light'],['type' => 'submit'])?>
                    </div> 
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
