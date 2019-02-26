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
                    <?php foreach ($bidders as $bidders): ?>
                        <?php
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
                                    <p class="chip orange badge white-text right"><?= $bidders->status ?>
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
                                <span class="card-title grey-text text-darken-4"><?= $bidders->user->fullname ?> 
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
                                <a class="green waves-effect waves-light btn-small">Accept</a>
                                <a class="red waves-effect waves-light btn-small">Reject</a>
                                <a class="grey waves-effect waves-light btn-small">Ignore</a>
                            </div>
                        </div>
                    <?php endforeach; ?>      
                        
                </div>
            </div>
        </div>
    </div>
</div>


<div id="tasks" class="col s12">Test 2</div>
