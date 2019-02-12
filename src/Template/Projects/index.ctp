  <!-- File: src/Template/Projects/index.ctp -->
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="active blue-grey-text" href="#projectfeed">Timeline</a></li>
        <li class="tab col s4"><a class="blue-grey-text" href="#myprojects ">My Projects</a></li>
        <li class="tab col s4"><a class="blue-grey-text" href="#myskills">My Skills</a></li>
      </ul>
    </div>
    <div id="projectfeed">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 s3 m3">
                <div class="card-panel white">
                    Filter Menu
                </div>
            </div>
            <div class="col s12 l8 m8"> 
            <?php foreach ($projects as $projects): ?>        
                <div class="card white" style="font-size:10pt">
                    <div>
                        <div class="row valign-wrapper card-content">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s6 valign-wrapper">
                                        <img src="webroot\img\port.jpg" height="2" alt="" 
                                            class=" circle responsive-img" style="width: 10%;">
                                            <span style="margin-left:2px"> Name (Major)</span>
                                    </div>
                                    <div class="col s6">
                                        <h6 class="brown-text "><?= $projects->short_title?>
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
                                            <div class="col s12 m8 l8">
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
                                                <p><?=  $this->Html->Link($projects->link); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collaborators<?= $projects->id?>">
                                        <div class="row">
                                            <div class="col s12 m4 l4">
                                                <p>I'm requesting <?= $projects->collaborators?> 
                                                    collaborators</p>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <p>Skills Required:</p>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <button class="btn-small black white-text" 
                                                    style="margin-top:3px">Request to join</button>
                                            </div>
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
            <div class="card white">
                <div class="card-content">
                    <span class="card-title">Projects
                        <?= $this->Html->link('New','/projects/add', 
                        ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small']
                        );?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div id="myskills" class="col s12">Test 3</div>
</div>