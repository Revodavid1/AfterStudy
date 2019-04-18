<!-- File: src/Template/Projects/index.ctp -->
<?php echo $this->element('projectnavextend'); ?>

<div class="row">
    <div id="projectfeed" class="col s12">
        <p class='blue-grey-text'><span class='left'><i class="small material-icons">info</i></span>
            These are projects owned by individuals. To create a Group,click on the Groups link on the side navigation
        </p>
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
                                                    <?= $projects->user->fullname?></span>
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
                                                        <p>Requested: <?= $projects->collaborators?></p>
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
</div>