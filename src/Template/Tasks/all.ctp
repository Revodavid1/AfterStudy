<!-- File: src/Template/Taskgroups/index.ctp -->
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 l2 m2">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <span class="card-title">
                            <?= $this->Html->link('Create Tasks',
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
                                            <?= $this->Html->link($projects_alltasks->title, 
                                            ['action' => 'view',$projects_alltasks->project_id,
                                            $projects_alltasks->id]) ?>
                                            <a class="orange waves-effect waves-light btn-small modal-trigger circle" 
                            href="#<?=$projects_alltasks->id?>">Edit</a>
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
                                            <h4>Modal Header</h4>
                                            <?= $projects_alltasks->assignee['fullname']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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