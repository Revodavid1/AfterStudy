<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content container">
                <span class="card-title black-text center">Log in to AfterStudy</span>
                <?= $this->Form->create() ?>
                <div class="row">
                    <div class="input-field col s12">
                        <?= $this->Form->control(('email'),['type' => 'email'])?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <?= $this->Form->control(('password'),['type' => 'password'])?>
                    </div>
                </div>
                <div class="row center">
                    <?= $this->Form->button(('Submit'),['class' => 'btn waves-effect black white-text 
                        waves-light'],['type' => 'submit'])?>
                </div> 
                <?= $this->Form->end() ?>
                <div class="row center">
                    <?= $this->Html->link('No Account? Sign Up Here', ['action' => 'register']) ?>
                </div> 
            </div>
        </div>
    </div>
</div>    