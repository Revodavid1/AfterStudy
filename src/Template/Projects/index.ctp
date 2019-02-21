<!-- File: src/Template/Projects/index.ctp -->
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active blue-grey-text" href="#projectfeed">Timeline</a></li>
        <li class="tab col s4"><a class="blue-grey-text" href="#myprojects ">My Projects</a></li>
        <li class="tab col s4"><a class="blue-grey-text" href="#myrequests">My Requests</a></li>
      </ul>
    </div>
    <div id="projectfeed" class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 s3 m3">
                <div class="card-panel white z-depth-2">
                    Filter Menu
                </div>
            </div>
            <div class="col s12 l8 m8"> 
            <?php foreach ($projects as $projects): ?>   
                <div class="card white z-depth-2" style="font-size:10pt">
                    <div>
                        <div class="row valign-wrapper card-content">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s6 valign-wrapper">
                                        <img src="webroot\img\port.jpg" height="2" alt="" 
                                            class=" circle responsive-img" style="width: 10%;">
                                            <span style="margin-left:2px;font-weight:bold" class="black-grey-text"> 
                                                <?= $projects->user->fullname?>
                                                (<?= $projects->user->major?>)</span>
                                    </div>
                                    <div class="col s6">
                                        <h6 class="brown-text" style="text-transform: capitalize">
                                            <?= $projects->short_title?>
                                            (<?= $projects->type ?> Project)</h6>
                                    </div>
                                </div>
                                
                                <div class="card-tabs row">
                                    <ul class="tabs tabs-fixed-width col s12">
                                        <li class="tab"><a href="#info<?= $projects->id?>" class="active">
                                            <i class="material-icons blue-grey-text">info_outline</i></a></li>
                                        <li class="tab"><a href="#dates<?= $projects->id?>" class="active">
                                            <i class="material-icons blue-grey-text">date_range</i></a></li>
                                        <li class="tab"><a href="#links<?= $projects->id?>">
                                            <i class="material-icons blue-grey-text">link</i></a></li>
                                        <li class="tab"><a href="#collaborators<?= $projects->id?>">
                                            <i class="material-icons blue-grey-text">person_add</i></a></li>
                                    </ul>
                                </div>
                                <div class="card-content white">
                                    <div id="info<?= $projects->id?>">
                                        <div class="row">
                                            <div class="col s12 m8 l8" style="text-align: justify;">
                                                <?= $projects->description?>
                                            </div>
                                            <div class="col s12 m4 l4"> 
                                                <p class="green-text">Status: <?= $projects->status?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dates<?= $projects->id?>">
                                        <div class="row">
                                            <div class="col s12 m3 l3">
                                                <p>Created: <?= $projects->created
                                                    ->i18nFormat('MM/dd/yyyy'); ?></p>
                                            </div>
                                            <div class="col s12 m3 l3">
                                                <p>Start Date: <?= $projects->proposed_start_date ?></p>
                                            </div>
                                            <div class="col s12 m3 l3">
                                                <p>End Date: <?= $projects->proposed_end_date ?></p>
                                            </div>
                                            <div class="col s12 m3 l3">
                                                <p>Apply Before: <?= $projects->last_date_apply ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="links<?= $projects->id?>">
                                        <div class="row">
                                            <div class="col s12 m6 l6">
                                                <p>Supporting Link (external document, code,etc)</p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p><?=  $this->Html->Link(__($projects->link),$projects->link,
                                                    ['target' => '_blank']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collaborators<?= $projects->id?>">
                                        <div class="row">
                                            <?php if (($projects->collaborators) > 0): ?>  
                                                <div class="col s12 m4 l4">
                                                    <p>Needs: <?= $projects->collaborators?></p>
                                                    <p>Interests: <?php echo(sizeof($projects->bids))?></p>
                                                    <p>Accepted: 0</p>
                                                </div>
                                                <?php if ($projects->skills): ?>    
                                                    <div class="col s12 m4 l4">
                                                        <p>Skills requested: 
                                                            <?php foreach ($projects->skills as $projectskills): ?>    
                                                                <p><?=$projectskills['skill_title'];?> </p>
                                                            <?php endforeach; ?>
                                                        </p>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="col s12 m4 l4">
                                                        <p>No skills requested</p>
                                                    </div>
                                                <?php endif; ?>
                                                    <?php if (($projects->user->id) === ($this->Session->read
                                                        ('Auth.User.id'))): ?>    
                                                    <?php else: ?>
                                                        <?php $requested=array_search($this->Session->read
                                                            ('Auth.User.id'),array_column($projects->bids,
                                                            'user_id'));?>
                                                        <?php if (is_int($requested)): ?> 
                                                            <div class="col s12 m4 l4">
                                                                <?= $this->Form->button('Requested',
                                                                ['class'=>'btn-small black white-text disabled'])
                                                                ?>
                                                            </div>
                                                            <?php else: ?>
                                                            <div class="col s12 m4 l4">
                                                                <?= $this->Form->PostLink('Request to Join',
                                                                ['controller'=>'bids','action' => 'add', 
                                                                $projects->id],
                                                                ['class'=>'btn-small black white-text'])
                                                                ?>
                                                            </div>
                                                            <?php endif; ?>   
                                                    <?php endif; ?>   
                                                <?php else: ?>
                                                    <div class="col s12 m4 l4">
                                                        <p>No collaborators requested</p>
                                                    </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="col s1"></div>
        </div>
    </div>
    <div id="myprojects" class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 l2 m2">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <span class="card-title">
                            <?= $this->Html->link('Create New','/projects/add', 
                            ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small z-depth-5']
                            );?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col s12 m9 l9">
                <div class="card white z-depth-2">
                    <div class="card-content">
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
                                <?php foreach ($myprojects as $myprojects): ?>
                                <tr class="z-depth-1">
                                    <td>
                                        <?= $this->Html->link($myprojects->short_title, ['action' => 'view', 
                                            $myprojects->description]) ?>
                                    </td>
                                    <td>
                                        <?= $myprojects->status; ?>
                                    </td>
                                    <td>
                                        <?= $myprojects->created->i18nFormat('MM/dd/yyyy'); ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->Link($this->Html->tag('i','edit', 
                                            array('class'=>'material-icons')),array('action' => 'edit', 
                                            $myprojects->slug),array('escape' => false));?>
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
    <div id="myrequests" class="col s12">
        <div class="row">
            <div class="col s0 m1 l1"></div>
            <div class="col s12 m10 l10">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Project Title</th>
                                    <th>Status</th>
                                    <th>Owned By</th>
                                    <th>Last Updated On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projectrequests as $projectrequests): ?>
                                <tr class="z-depth-1">
                                    <td>
                                        <?= $projectrequests->short_title ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->_matchingData['Bids']->status; ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->user->fullname; ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->_matchingData['Bids']->modified
                                            ->i18nFormat('MM/dd/yyyy'); ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->PostLink($this->Html->tag('i','delete', 
                                            array('class'=>'material-icons')),array('action' => 'delete', 
                                            $projectrequests->_matchingData['Bids']->id),array('class'=>'red-text','escape' => false));?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s0 m1 l1"></div>
        </div>
    </div>
</div>