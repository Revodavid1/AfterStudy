<!-- File: src/Template/Taskgroups/index.ctp -->
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 l2 m2">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <span class="card-title">
                            <?= $this->Html->link('Create Task',
                            ['controller'=>'Tasks','action' => 'add',$id], 
                            ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small z-depth-5']
                            );?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col s12 m9 l9">
                <div class="card white">
                    <div class="card-content">
                        <span class="card-title">All Tasks</span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Group</th>
                                    <th>Status</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Created</th>
                                    <th>Created By</th>
                                    <th>Assigned To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects_alltasks as $projects_alltasks): ?>
                                    <tr>
                                        <td>
                                            <a class="btn-flat blue-text modal-trigger"
                                                href="#<?=$projects_alltasks->id?>"><?=$projects_alltasks->title?>
                                            </a>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->taskgroup['title']; ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->status; ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->time_start->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->time_end->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->created->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->creator['fullname']; ?>
                                        </td>
                                        <td>
                                            <?= $projects_alltasks->assignee['fullname']; ?>
                                        </td>
                                    </tr>
                                    <!-- Modal Structure -->
                                    <div id="<?=$projects_alltasks->id;?>" class="modal white">
                                        <div class="modal-content">
                                            <h4><?= $projects_alltasks->title; ?></h4>
                                            <p>Description:<?= $projects_alltasks->description; ?>
                                            <p>Status:<?= $projects_alltasks->status; ?>
                                            <hr/>
                                            <p>Created by: <?= $projects_alltasks->creator['fullname']; ?>
                                            <p>Assigned to: <?= $projects_alltasks->assignee['fullname']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="red modal-close waves-effect white-text btn-flat">
                                            Close</a>
                                        </div>
                                    </div>
                                    <!-- Modal Structure -->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>