<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row">
    <div class="col s12">
       <div class="card">
            <div class="card-content">
                <span class="card-title black-text center">Create an Account</span>
                <?= $this->Form->create($user)?>
                    <div class="row">
                        <div class="">
                            <div class="input-field col s6">
                                <div class="col s2">
                                    <i class="material-icons prefix">account_circle</i>
                                </div>
                                <div class="col s10">
                                    <?= $this->Form->control(('fullname'),['type' => 'text']);?>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <div class="col s2">
                                    <i class="material-icons prefix">phone</i>
                                </div>
                                <div class="col s10">
                                    <?= $this->Form->input('phone',array('maxlength'=>'10'),['type'=>'tel']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row center">
                        <div class="col s6 browser-default">
                            <?= $this->Form->input('major', array('type' => 'select', 
                                'class'=>'browser-default','options'=>
                                    ['MSIT' => 'MSIT', 'CSE' => 'CSE', 'BIOTECH' => 'BIOTECH'],
                                'empty' => '(choose one)'),
                            );?>
                        </div>
                        <div class="col s6">
                            <?= $this->Form->input('class_standing', array('type' => 'select', 
                                'class'=>'browser-default','options'=>
                                    ['Freshman' => 'Freshman', 'Sophomore' => 'Sophomore', 
                                    'Junior' => 'Junior','Senior' => 'Senior','Graduate' => 'Graduate'],
                                'empty' => '(choose one)'),
                            );?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="col s2">
                                <i class="material-icons prefix">email</i>
                            </div>
                            <div class="col s10">
                                <?= $this->Form->input('email',array('type' => 'text',
                                    'label'=>'Email ID (ex: abc0001)'));?>
                            </div>
                        </div>
                        <div class="col s6 center">
                            <?= $this->Form->input('domain', array('type' => 'select', 
                                'class'=>'browser-default','options'=>['@wildcats.unh.edu'],'disabled'=>'true'),
                            );?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <div class="col s2">
                                <i class="material-icons prefix">vpn_key</i>
                            </div>
                            <div class="col s10">
                                <?= $this->Form->control(('password'),['type' => 'password'])?>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <?= $this->form->control('dob',array('class'=>'datepicker','type'=>'text','label'=>
                                'Date of Birth')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 center">
                            <?= $this->Form->input('residential_status', array('type' => 'select', 
                                'class'=>'browser-default','options'=>
                                ['In-State' => 'In-State','Out-of-State' => 'Out-of-State',
                                'International' => 'International'],
                                'empty' => '(choose one)'),
                            );?>
                        </div>
                        <div class="col s6 center">
                            <?= $this->Form->input('country_origin', array('type' => 'select', 
                                'class'=>'browser-default','options'=>
                                ['USA' => 'USA','Nigeria' => 'Nigeria','India' => 'India'],
                                'empty' => '(choose one)','label'=>'Country of Origin'),
                            );?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 center">
                            <?= $this->Form->input('state_resident', array('type' => 'select', 
                                'class'=>'browser-default','options'=>
                                ['NH' => 'NH','MA' => 'MA','TX' => 'TX'],'empty' => '(choose one)'),
                            );?>
                        </div>
                        <div class="col s6">
                            <div class="col s2">
                                <i class="material-icons prefix">location_on</i>
                            </div>
                            <div class="col s10">
                                <?= $this->Form->control(('zip_code'),['type' => 'text']);?>
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
