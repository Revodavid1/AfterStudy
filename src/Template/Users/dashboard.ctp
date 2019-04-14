<div class="row"></div>
<div class="row" style="margin-left:0.5px;margin-right:0.5px;">
    <div class="col s12 m3 l3">
        <div class="revcard card">
            <div class="card-image">
                <?=$this->Html->image('port.jpg',['style'=>'width:100%;max-height: 200px;']);?>
                <a class="btn-floating halfway-fab waves-effect waves-light orange">
                    <i class="material-icons">edit</i></a>
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
                        <span class="card-title">Projects<?= $this->Html->Link($this->Html->tag('i','add', 
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
                <li class="collection-item"><div>Requests I made 
                    <span class="chip orange badge white-text"><?=$requestedprojectcount?></span>
                    </div>
                </li>
                <li class="collection-item"><div>Requests to join me
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>- your request accepted<a href="#!" class="secondary-content">
                    <i class="material-icons avatar green circle white-text tooltipped"
                    data-position="bottom" data-tooltip="View accepted requests">check</i></a></div></li>
                <li class="collection-item"><div>- your request rejected<a href="#!" class="secondary-content">
                    <i class="material-icons avatar red circle white-text tooltipped"
                    data-position="bottom" data-tooltip="View rejected requests">highlight_off</i></a></div></li>
                <li class="collection-item"><div>- collaborated with<a href="#!" class="secondary-content">
                    <i class="material-icons avatar white  black-text tooltipped"
                    data-position="bottom" data-tooltip="See Requests to Collaborate">people</i></a></div></li>
                <li class="collection-item"><div>- completed<a href="#!" class="secondary-content">
                    <i class="material-icons avatar green circle white-text tooltipped"
                    data-position="bottom" data-tooltip="View Completed Projects">event_available</i></a></div></li>
                <li class="collection-item"><div>- Average Rating<a href="#!" class="secondary-content">
                    <i class="material-icons avatar amber-text white tooltipped"
                    data-position="bottom" data-tooltip="See Project Ratings">star</i></a></div></li>
            </ul>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                        <span class="card-title">QA</span>
                    </div>
                </div>
            </div>
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
                <li class="collection-item"><div>Other Groups Joined
                    <span class="chip orange badge white-text"> - </span>
                    </div>
                </li>
                <li class="collection-item"><div>Group Project Created
                    <span class="chip orange badge white-text"> - </span>
                    </div>
                </li>
                <li class="collection-item"><div>Other Groups Joined
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>TaskGroups Created
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>Group Tasks Created
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Assigned to Me
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>Tasks Completed
                    <span class="chip orange badge white-text">- </span>
                    </div>
                </li>
                <li class="collection-item"><div>Group Ratings
                    <span class="chip orange badge white-text">- </span>
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
