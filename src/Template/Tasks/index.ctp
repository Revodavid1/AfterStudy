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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects_tasks as $projects_tasks): ?>
                                    <tr>
                                        <td>
                                            <?= $this->Html->link($projects_tasks->title, 
                                            ['action' => 'view',$projects_tasks->project_id,
                                            $projects_tasks->id]) ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->taskgroup['title']; ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->status; ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->time_start->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->time_end->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->created->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $projects_tasks->creator['fullname']; ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->Link($this->Html->tag('i','edit', 
                                                array('class'=>'material-icons')),array('action' => 'edit', 
                                                $projects_tasks->id),array('escape' => false));?>
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
</div>