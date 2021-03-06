<?php 
    $selected = []; 
    foreach($thisgroupMembers as $selectedmembers){
        foreach($selectedmembers->users as $key => $value)
        {
            array_push($selected,$value['id']);
        }  
    }                     
?>
<?php echo $this->element('groupnavextend'); ?>
<div class="card white" style="margin-top:5px">
<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row" style="margin:5px">
    <?= $this->Form->create($thisgroup)?>
        <div class="input-field">
            <?= $this->Form->control(('title'),array('maxlength'=>'255'),
            ['type' => 'text']);?>
                <?= $this->Form->button(('Update Title'),['class' => 'green waves-effect waves-light 
            btn-flat white-text'],['type' => 'submit'])?>
        </div>
        <?= $this->Form->end() ?>
</div>

<div class = "row" style="margin:2px">
    <div class = "col s12 m4 l4">
        <ul class="collapsible with-header">
            <li>
                <div class="collapsible-header">
                    <h4><i class="material-icons">keyboard_arrow_down</i>Members<span>
                        <a class="orange waves-effect waves-light btn-small modal-trigger circle" 
                        href="#addmembersmodal">Edit</a></span>
                    </h4>
                </div>
                <div class="collapsible-body active">
                    <span>
                        <table class="responsive-table">
                            <tbody>
                                <?php foreach ($thisgroupMembers as $thisgroupMember):?>
                                    <tr>
                                        <td><?=$thisgroupMember->admin['fullname']?>
                                            <span class="badge amber white-text">Owner</span>
                                        </td>
                                    </tr>
                                    <?php foreach ($thisgroupMember->users as $othermembers): ?>
                                        <tr>
                                            <td><?=$othermembers['fullname']?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </span>
                </div>
            </li>
        </ul>
    </div>
    <div class = "col s12 m8 l8">
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Group Projects
                    <?= $this->Html->link('Create New',['action' => 'addproject',$groupid,$owner], 
                    ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small z-depth-2']
                    );?>
                </span>
                <p class='blue-grey-text'><span class='left'><i class="small material-icons">info</i></span>
                    Group projects are only available to group members.
                </p>
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Short Title</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mygroupsproject as $groupsprojects): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link($groupsprojects->short_title, 
                                    ['controller'=>'projects',
                                    'action' => 'projectmode',$groupsprojects->id_alias]) ?>
                                </td>
                                <td>
                                    <?= $groupsprojects->status; ?>
                                </td>
                                <td>
                                    <?= $groupsprojects->created->i18nFormat('MM/dd/yyyy'); ?>
                                </td>
                                <td>
                                    <?= $this->Html->Link($this->Html->tag('i','edit', 
                                        array('class'=>'material-icons')),array('action' => 'edit', 
                                        $groupsprojects->slug),array('escape' => false));?>
                                    <?= $this->Html->Link($this->Html->tag('i','people', 
                                        array('class'=>'material-icons black-text')),
                                        array('controller'=>'projects','action' => 'members',
                                                $groupsprojects->id_alias),
                                        array('escape' => false));
                                    ?>
                                    <?= $this->Html->Link($this->Html->tag('i','view_list', 
                                        array('class'=>'material-icons black-text')),
                                        array('action' => 'members',$groupsprojects->id_alias),
                                        array('escape' => false));
                                    ?>
                                    <i class="material-icons red-text">delete</i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>
</div>
<!-- Modal Structure -->
<div id="addmembersmodal" class="modal white">
    <div class="modal-content">
        <?= $this->Flash->render() ?>
        <h4>Add Member</h4>
        <?= $this->Form->create($thisgroupMembers)?>
        <div class="row">
            <?= $this->Form->label('Add members to group (Hold ctrl to select muliple)');?>
        </div>
        <div class="row">
            <div  class="col s6">
                <input type="text" id="userInput" onkeyup="filterUsers()" placeholder="Filter member list..">
            </div>
            <div class="col s6">
                <?= $this->Form->input('users._ids', array('type'=>'select','options'=>$allusers,
                'multiple' => true, 'size'=>10,'class'=>'browser-default', 'style'=>'height:auto',
                'label'=>false,'id'=>'usersid','value' => $selected)
                );?>
            </div>
        </div>
    </div>
    <div class="modal-footer blue-grey">
        <?= $this->Form->button(('Submit'),['class' => 'waves-effect green waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
         <a href="#!" class="modal-close red white-text waves-effect waves-light btn-flat">Cancel</a>
    
    </div>
    <?= $this->Form->end() ?>
</div>
<!-- Modal Structure -->
