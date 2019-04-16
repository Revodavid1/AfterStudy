<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row">
    <div class="col s12">
       <div class="card">
            <div class="card-content">
                <span class="card-title black-text center">Verify Email</span>
                <?= $this->Form->create($verifyuser)?>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="col s2">
                            <i class="material-icons prefix">verified_user</i>
                        </div>
                        <div class="col s10">
                            <?= $this->Form->control('v_code',array('type' => 'text',
                            'label'=>'Please verify with the code sent to your email','required'=>true));?>
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