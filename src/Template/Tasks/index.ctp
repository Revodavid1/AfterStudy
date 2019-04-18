<!-- File: src/Template/Taskgroups/index.ctp -->
<?php echo $this->element('projecttasksnavextend'); ?>
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
                        <span class="card-title">Tasks Assigned to Me</span>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects_tasks as $projects_tasks): ?>
                                    <tr>
                                        <td>
                                            <?php if($projects_tasks->status == 'Marked as Completed'|| 
                                                $projects_tasks->status =='Completed'):?>
                                                <a class="btn-flat blue-text modal-trigger"
                                                    style="text-decoration: line-through;"
                                                    href="#<?=$projects_tasks->id?>"><?=$projects_tasks->title?>
                                                </a>
                                            <?php else:?>
                                                <a class="btn-flat blue-text modal-trigger"
                                                    href="#<?=$projects_tasks->id?>"><?=$projects_tasks->title?>
                                                </a>
                                            <?php endif?>
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
                                    </tr>
                                    <!-- Modal Structure -->
                                    <div id="<?=$projects_tasks->id;?>" class="modal white">
                                        <div class="modal-content">
                                            <h4><?= $projects_tasks->title; ?></h4>
                                            <p>Description:<?= $projects_tasks->description; ?>
                                            <p>Status: <?= $projects_tasks->status; ?>
                                            <hr/>
                                            <p>Created by: <?= $projects_tasks->creator['fullname']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <?php if($projects_tasks->status == 'Pending' || 
                                                $projects_tasks->status =='Completed'):?>
                                                <?= $this->Form->button('Pending',
                                                ['class'=>'btn-small black white-text disabled'])
                                                ?>
                                            <?php else:?>
                                                <?= $this->Form->PostLink('Set to Pending',
                                                    ['action' => 'edit',$id,$projects_tasks->id,'Pending'],
                                                    ['class'=>'btn-small orange white-text'])
                                                ?>
                                            <?php endif?>
                                            <?php if($projects_tasks->status == 'Work in Progress' || 
                                                $projects_tasks->status =='Completed'):?>
                                                <?= $this->Form->button('Set as Work in Progress',
                                                ['class'=>'btn-small black white-text disabled'])
                                                ?>
                                            <?php else:?>
                                                <?= $this->Form->PostLink('Set to Work in Progress',
                                                    ['action' => 'edit',$id,$projects_tasks->id,'Work in Progress'],
                                                    ['class'=>'btn-small amber white-text'])
                                                ?>
                                            <?php endif?>
                                            <?php if($projects_tasks->status == 'Marked as Completed'|| 
                                                $projects_tasks->status =='Completed'):?>
                                                <?= $this->Form->button('Mark as Completed',
                                                ['class'=>'btn-small black white-text disabled'])
                                                ?>
                                            <?php else:?>
                                                <?= $this->Form->PostLink('Mark as Completed',['action' => 'edit',
                                                    $id,$projects_tasks->id,'Marked as Completed'],
                                                    ['class'=>'btn-small green white-text'])
                                                ?>
                                            <?php endif?>
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