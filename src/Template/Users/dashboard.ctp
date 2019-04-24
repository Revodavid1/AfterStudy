<div class="row"></div>
<div class="row" style="margin-left:0.5px;margin-right:0.5px;">
    <div class="col s12 m3 l3">
        <div class="revcard card">
            <div class="card-image">
                <?=$this->Html->image('blankuser.png',['style'=>'width:100%;max-height: 250px;']);?>
                <?= $this->Html->Link($this->Html->tag('i','edit', 
                        array('class'=>'material-icons')),
                        array('action' => 'edit'),
                        array('class'=>'btn-floating halfway-fab waves-effect waves-light orange','escape' => false)
                );?>
            </div>
            <div class="row">
                <div class="col s10"><h2 
                    style="font-weight:400;font-size:2.0rem;line-height: 1.33333;display: inline;">
                    <?= $this->Session->read('Auth.User.fullname');?></h2>
                </div>
                <div class="col s10">
                    <span><h2 style="margin-bottom: 2px; margin-top: 4px;font-size:1.0rem;line-height: 
                    1.33333;font-weight:400;display: inline;">
                    <?= $this->Session->read('Auth.User.email');?>
                    <br/>
                    <?= $this->Session->read('Auth.User.phone');?> 
                    </h2></span>
                </div>
            </div>
        </div>
        <div class="row" >
            <ul class="collapsible with-header">
                <li>
                    <div class="collapsible-header">
                        <h4><i class="material-icons">keyboard_arrow_down</i>Skills<span>
                            <a class="orange waves-effect waves-light btn-small modal-trigger circle" 
                            href="#addskillsmodal">Edit</a></span>
                        </h4>
                    </div>
                    <div class="collapsible-body active">
                        <span>
                            <table class="responsive-table">
                                <tbody>
                                <?php foreach ($skillsadd->skills as $myskills):?>
                                    <tr class="z-depth-1">
                                        <td><?=$myskills->skill_title?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col s12 l3 m3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                        <span class="card-title">Individual Projects
                            <?= $this->Html->Link($this->Html->tag('i','add', 
                            array('class'=>'material-icons avatar black circle white-text tooltipped',
                            'data-position'=>'bottom','data-tooltip'=>'Add a Project')),
                            array('controller'=>'projects','action' => 'add'),
                            array('class'=>'secondary-content','escape' => false)
                    );?></span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <ul class="col s12 collection">
                <li class="collection-item"><div>Projects Created <span class="chip black badge white-text">
                    <?=$myprojectcount?></span></div>
                </li>
                <li class="collection-item"><div>My Bids 
                    <span class="chip green badge white-text"><?=$requestedprojectcount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>My Bids (Accepted)
                    <span class="chip green badge white-text"><?=$requestsacceptedquerycount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>My Bids (Rejected)
                    <span class="chip red badge white-text"><?=$requestsrejectedquerycount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Requests to join me
                    <span class="chip green badge white-text"><?=$joinmequerycount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Completed Projects
                    <span class="chip green badge white-text"><?=$projectcompletequerycount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>In Progress Projects
                    <span class="chip orange badge white-text"><?=$projectinprogressquerycount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Created
                    <span class="chip black badge white-text"> <?=$taskscreatedquerycount ?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Assigned to Me
                    <span class="chip orange badge white-text"> <?=$tasksassignedtoquerycount?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Completed
                    <span class="chip green badge white-text"> <?=$taskscompletedquerycount?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Pending
                    <span class="chip orange badge white-text"> <?=$taskspendingquerycount?> </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                        <span class="card-title">Groups<?= $this->Html->Link($this->Html->tag('i','add', 
                                array('class'=>'material-icons avatar black circle white-text tooltipped',
                                'data-position'=>'bottom','data-tooltip'=>'Add a Group')),
                                array('controller'=>'groups','action' => 'index'),
                                array('class'=>'secondary-content','escape' => false)
                        );?></span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <ul class="col s12 collection">
                <li class="collection-item"><div>Groups Created <span class="chip black badge white-text">
                    <?=$mygroupcount?></div>
                </li>
                <li class="collection-item"><div>Other Groups
                    <span class="chip green badge white-text"><?= $myothergroupcount ?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Projects Created
                    <span class="chip black badge white-text"> <?= $myownedgroupprojectscount ?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Created
                    <span class="chip black badge white-text"> <?=$grouptaskscreatedquerycount ?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Assigned to Me
                    <span class="chip orange badge white-text"> <?=$grouptasksassignedtoquerycount?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Completed
                    <span class="chip green badge white-text"> <?=$grouptaskscompletedquerycount?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Pending
                    <span class="chip orange badge white-text"> <?=$grouptaskspendingquerycount?> </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                    <span class="card-title">QA<?= $this->Html->Link($this->Html->tag('i','add', 
                                array('class'=>'material-icons avatar black circle white-text tooltipped',
                                'data-position'=>'bottom','data-tooltip'=>'Add a Question')),
                                array('controller'=>'questions','action' => 'add'),
                                array('class'=>'secondary-content','escape' => false)
                        );?></span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <ul class="col s12 collection">
                <li class="collection-item"><div>Questions Created <span class="chip black badge white-text">
                    <?=$myquestionscount?></div>
                </li>
                <li class="collection-item"><div>Project Related
                    <span class="chip black badge white-text"><?= $myprojectquestionscount ?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Questions Answered
                    <span class="chip green badge white-text"> <?= $myquestionsansweredcount ?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>My Answers
                    <span class="chip black badge white-text"> <?=$myanswerscount ?> </span>
                    </div>
                </li>
                <li class="collection-item"><div>My Helpful Answers
                    <span class="chip green badge white-text"> <?=$myhelpfulanswerscount?> </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="addskillsmodal" class="modal white">
    <div class="modal-content">
        <?= $this->Flash->render() ?>
        <h4>Add Skills</h4>
        <?= $this->Form->create($skillsadd)?>
        <div class="row">
            <?= $this->Form->label('Select skills of collaborators (Hold ctrl to select muliple)');?>
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
    </div>
    <div class="modal-footer blue-grey">
        <?= $this->Form->button(('Submit'),['class' => 'waves-effect green waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
         <a href="#!" class="modal-close red white-text waves-effect waves-light btn-flat">Cancel</a>
    
    </div>
    <?= $this->Form->end() ?>
</div>
<!-- Modal Structure -->
