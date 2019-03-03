<?php echo $this->element('navextend');?>

<div id="members" class="col s12 l2 m2">
    <div class="row">
        <div class="col s12 l12 m12"> 
            <?php foreach ($thisproject as $thisproject): ?>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header blue-grey darken-1 white-text">
                            <i class="material-icons">keyboard_arrow_down</i>Project Information
                        </div>
                        <div class="collapsible-body">
                            <span>
                                <div class="card grey darken-1">
                                    <div class="card-content white-text">
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s12">
                                                <p>Title: <?= $thisproject->short_title;?> | 
                                                <?= $thisproject->link;?></p>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s12">
                                                <p> Description: <?= $thisproject->description; ?></p>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s4">
                                                <p> Project Type: <?= $thisproject->type; ?> project</p>
                                            </div>
                                            <div class="col s4">
                                                <p> Status: <?= $thisproject->status; ?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> Created by: <?= $thisproject->user->fullname;?>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s4">
                                                <p> Created on:<?= $thisproject->created
                                                ->i18nFormat('MM/dd/yyyy');?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> Start Date: <?= $thisproject->proposed_start_date->
                                                i18nFormat('MM/dd/yyyy'); ?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> End Date: <?= $thisproject->proposed_end_date
                                                ->i18nFormat('MM/dd/yyyy'); ?></p>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s4">
                                                <p> Collaborators Needed: <?= $thisproject->collaborators; ?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> Skills Needed: <span>
                                                <?php foreach ($thisproject->skills as $projectskills): ?>    
                                                    <p><?=$projectskills['skill_title'];?></p>
                                                <?php endforeach; ?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> Last Date to Apply: <?= $thisproject->last_date_apply; ?></p>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s4">
                                                <p> Interests: <?php echo(sizeof($thisproject->bids))?></p>
                                            </div>
                                            <div class="col s4">
                                                <p>Open to Sponsors: <?= $thisproject->want_sponsors; ?></p>
                                            </div>
                                            <div class="col s4">
                                                <p> Shared with: <?= $thisproject->privacy; ?></p>
                                            </div>
                                        </div>
                                        <hr/>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </li>
                </ul>
            <?php endforeach;?>
        </div>
    </div>
    <div class="row">
        <div class="col s12 s3 m3">
            <ul class="collapsible">
                <li class="active">
                    <div class="collapsible-header blue-grey darken-1 white-text">
                        <i class="material-icons">keyboard_arrow_down</i>
                        <i class="material-icons">people</i>Members
                    </div>
                    <div class="collapsible-body"><span>
                        <ul class="collection">
                            <li class="collection-item"><?=$thisproject->user->fullname?></li>
                            <?php foreach ($bidders as $projectmembers): ?>
                                <?php if ($projectmembers->status ==  'Accepted'): ?>
                                    <li class="collection-item">
                                        <?=$projectmembers->user->fullname?></li>
                                <?php endif ?>
                             <?php endforeach?>
                        </ul>
                    </span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col s12 s9 m9">
            <div class="card-panel white z-depth-2">
                <div class="card-content">
                    <span class="card-title">Requests</span> 
                    <?php if ($thisproject->user_id == $this->Session->read('Auth.User.id')):?>
                        <?php foreach ($bidders as $bidders): ?>
                            <?php
                                //echo($bidders->id);
                                $reqskill=[];
                                $myskill=[];
                                foreach ($thisproject->skills as $allskill):
                                    array_push($reqskill,$allskill->skill_title);
                                endforeach;
                                foreach ($bidders->user->skills as $bidskill):
                                    array_push($myskill,$bidskill->skill_title);
                                endforeach;
                                $matchingskills = array_intersect($reqskill, $myskill);
                            ?>  
                            <div class="card">
                                <div class="card-content">
                                    <span class="grey-text text-darken-4">
                                        Requestor: <?= $bidders->user->fullname ?>
                                        <?php if($bidders->status == 'Requested'):?>
                                            <p class="chip orange badge white-text right z-depth-2">
                                            <?= $bidders->status ?>
                                        <?php elseif($bidders->status == 'Accepted'):?>
                                            <p class="chip green badge white-text right z-depth-2">
                                            <?= $bidders->status ?>
                                        <?php elseif($bidders->status == 'Rejected'):?>
                                            <p class="chip red badge white-text right z-depth-2">
                                            <?= $bidders->status ?>
                                        <?php elseif($bidders->status == 'Ignored'):?>
                                            <p class="chip brown badge white-text right z-depth-2">
                                            <?= $bidders->status ?>
                                        <?php endif ?>
                                        </p>
                                    </span>
                                    <p>Date: <?= $bidders->created->i18nFormat('MM/dd/yyyy') ?></p>
                                    <p>Matched Required Skills: 
                                        <?php if (sizeof($matchingskills)>0): ?>
                                            <?php foreach ($matchingskills as $key => $value): ?>
                                                <a class="btn-flat green-text"><?=$value;?></a>  
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <a class="btn-flat red-text">None</a>  
                                        <?php endif ?>     
                                    </p>  
                                    <a class="blue-grey white-text waves-effect waves-light btn-small activator">
                                        View Requestor's Other Skills
                                    </a>                          
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-3"><?= $bidders->user->fullname ?> 
                                    (<?= $bidders->user->major ?>)
                                    <i class="material-icons right">close</i></span>
                                    <p>Skills: 
                                        <?php foreach ($bidders->user->skills as $requesterskill):?>
                                            <a class="btn-flat blue-grey-text"><?=$requesterskill->skill_title;?>
                                            </a>       
                                        <?php endforeach; ?>
                                    </p>
                                </div>
                                <div class="card-action">
                                    <?php if($bidders->status == 'Accepted'):?>
                                        <?= $this->Form->button('Accepted',
                                        ['class'=>'btn-small black white-text disabled'])
                                        ?>
                                    <?php else:?>
                                        <?= $this->Form->PostLink('Accept',['controller'=>'bids',
                                        'action' => 'acceptbid',$bidders->id],['class'=>'btn-small green white-text'])?>
                                    <?php endif?>
                                    <?php if($bidders->status == 'Rejected'):?>
                                        <?= $this->Form->button('Rejected',
                                        ['class'=>'btn-small black white-text disabled'])
                                        ?>
                                    <?php else:?>
                                        <?= $this->Form->PostLink('Reject',['controller'=>'bids',
                                        'action' => 'rejectbid',$bidders->id],['class'=>'btn-small red white-text'])?>
                                    <?php endif?>
                                    <?php if($bidders->status == 'Ignored'):?>
                                        <?= $this->Form->button('Ignored',
                                        ['class'=>'btn-small black white-text disabled'])
                                        ?>
                                    <?php else:?>
                                        <?= $this->Form->PostLink('Ignore',['controller'=>'bids',
                                        'action' => 'ignorebid',$bidders->id],['class'=>'btn-small brown white-text'])?>
                                    <?php endif?> 
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col s12">
                                <div class="icon-block">
                                    <h2 class="center blue-grey-text"><?= $bidderscount ?></h2>
                                    <h5 class="center">Total Project Request</h5>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>            
                </div>
            </div>
        </div>
    </div>
</div>


<div id="tasks" class="col s12">Test 2</div>
