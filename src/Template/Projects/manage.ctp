<?php echo $this->element('navextend');?>

<div id="members" class="col s12 l2 m2">
    <div class="row">
        <div class="col s12 l12 m12"> 
            <?php foreach ($thisproject as $thisproject): ?>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">keyboard_arrow_down</i>Project Information
                        </div>
                        <div class="collapsible-body">
                            <span>
                                <div class="card blue-grey darken-1">
                                    <div class="card-content white-text">
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s3">
                                                <p> Title: <?= $thisproject->short_title; ?></p>
                                            </div>
                                            <div class="col s3">
                                                <p> Project Type: <?= $thisproject->type; ?> project</p>
                                            </div>
                                            <div class="col s3">
                                                <p> Status: <?= $thisproject->status; ?></p>
                                            </div>
                                            <div class="col s3">
                                                <p> Created by: <?= $thisproject->user->fullname;?>
                                            </div>
                                        </div>
                                        <div class="row" style="font-size:9.5pt">
                                            <div class="col s12">
                                                <p> Description: <?= $thisproject->description; ?></p>
                                            </div>
                                        </div>
                                            <div class="row" style="font-size:9.5pt">
                                                <div class="col s3">
                                                    <p> Created on:<?= $thisproject->created;?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> Start Date: <?= $thisproject->proposed_start_date; ?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> End Date: <?= $thisproject->proposed_end_date; ?></p>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size:9.5pt">
                                                <div class="col s12">
                                                    <p> Supporting Link: <?= $thisproject->link; ?></p>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size:9.5pt">
                                                <div class="col s3">
                                                    <p> Collaborators Needed: <?= $thisproject->collaborators; ?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> Skills Needed: <span>
                                                    <?php foreach ($thisproject->skills as $projectskills): ?>    
                                                        <p><?=$projectskills['skill_title'];?></p>
                                                    <?php endforeach; ?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> Last Date to Apply: <?= $thisproject->last_date_apply; ?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> Interests: <?php echo(sizeof($thisproject->bids))?></p>
                                                </div>
                                            </div>
                                            <div class="row" style="font-size:9.5pt">
                                                <div class="col s3">
                                                    <p> Want Sponsors: <?= $thisproject->want_sponsors; ?></p>
                                                </div>
                                                <div class="col s3">
                                                    <p> Shared with: <?= $thisproject->privacy; ?></p>
                                                </div>
                                            </div>
                                        </div>
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
            <div class="card-panel white z-depth-2">
                Members
            </div>
        </div>
        <div class="col s12 s9 m9">
            <div class="card-panel white z-depth-2">
                Requests
            </div>
        </div>
    </div>
</div>


<div id="tasks" class="col s12">Test 2</div>