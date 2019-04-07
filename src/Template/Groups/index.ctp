<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row" >
    <ul class="collapsible with-header">
        <li>
            <div class="collapsible-header">
                <h5><i class="material-icons">keyboard_arrow_down</i>Create Group</h5>
            </div>
            <div class="collapsible-body active">
                <span>   
                    <table class="responsive-table">
                        <tbody>
                            <?= $this->Form->create($addgroup)?>
                            <tr>
                                <td class="col s12 m10 l10">
                                    <div class="input-field">
                                        <?= $this->Form->control(('title'),array('maxlength'=>'255'),
                                        ['type' => 'text']);?>
                                    </div>
                                </td>
                                <td class="col s12 m2 l2">
                                    <div class="input-field">
                                        <?= $this->Form->button(('Submit'),['class' => 'green waves-effect waves-light 
                                        btn-flat white-text'],['type' => 'submit'])?>
                                    </div>
                                </td>
                            </tr>
                            <?= $this->Form->end() ?>
                        </tbody>
                    </table>
                </span>
            </div>
        </li>
    </ul>
</div>
<h3>My Groups</h3>
<hr/>
<div class="col s12">
    <div class="row">
        <div class="col s12 s3 m3">
            <div class="card-panel white z-depth-2">
                Filter Menu
            </div>
        </div>
        <div class="col s12 l8 m8"> 
            <?php foreach ($allgroups as $allgroups): ?>
                <?php $group_id = $allgroups->id; ?>
                <?php $owner = $allgroups->owner; 
                    if($allgroups->admin['id'] ==  $this->Session->read('Auth.User.id')){
                        echo'<div class="card white z-depth-2 col s6">
                            <div class="card-content black-grey-text">';
                    }
                    else{
                        echo '<div class="card blue-grey z-depth-2 col s6">
                        <div class="card-content white-text">';
                    }
                ?>

                
                        <span class="card-title tooltipped" 
                            style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"
                            data-position='bottom' data-tooltip='<?= $allgroups->title?>'>
                            <?= $allgroups->title?></span>
                        <hr/>
                        <p> 
                            Owner: <?= $allgroups->admin['fullname']?>
                        </p>
                        <div class="card-action">
                            <?= $this->Html->link('Details', 
                                ['action' => 'groupdetails', $group_id,$owner])
                            ?>
                        </div>
                    </div>    
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col s1"></div>
    </div>
</div>