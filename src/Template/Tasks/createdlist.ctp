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
                        <span class="card-title">Tasks Created by Me</span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Group</th>
                                    <th>Status</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Created</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mycreatedtasks as $mycreatedtasks): ?>
                                    <tr>
                                        <td>
                                            <?php if($mycreatedtasks->status == 'Marked as Completed'|| 
                                                $mycreatedtasks->status =='Completed'):?>
                                                <a class="btn-flat blue-text modal-trigger"
                                                    style="text-decoration: line-through;"
                                                    href="#<?=$mycreatedtasks->id?>"><?=$mycreatedtasks->title?>
                                                </a>
                                            <?php else:?>
                                                <a class="btn-flat blue-text modal-trigger"
                                                    href="#<?=$mycreatedtasks->id?>"><?=$mycreatedtasks->title?>
                                                </a>
                                            <?php endif?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->taskgroup['title']; ?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->status; ?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->time_start->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->time_end->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->created->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $mycreatedtasks->assignee['fullname']; ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->Link($this->Html->tag('i','edit', 
                                                array('class'=>'material-icons orange-text')),
                                                array('action' => 'update', 
                                                $id,$mycreatedtasks->id),array('escape' => false));?>
                                            <i class="material-icons red-text">delete</i>
                                        </td>
                                    </tr>
                                    <!-- Modal Structure -->
                                    <div id="<?=$mycreatedtasks->id;?>" class="modal white">
                                        <div class="modal-content">
                                            <h4><?= $mycreatedtasks->title; ?></h4>
                                            <p>Description:<?= $mycreatedtasks->description; ?>
                                            <p>Status: <?= $mycreatedtasks->status; ?>
                                            <hr/>
                                            <p>Created by: <?= $mycreatedtasks->creator['fullname']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <?php if($mycreatedtasks->status == 'Work in Progress' || 
                                                $mycreatedtasks->status =='Completed'|| 
                                                $mycreatedtasks->status == 'New'|| 
                                                $mycreatedtasks->status == 'Pending'):?>
                                                <?= $this->Form->button('Revert to Work in Progress',
                                                ['class'=>'btn-small black white-text disabled'])
                                                ?>
                                            <?php else:?>
                                                <?= $this->Form->PostLink('Revert to Work in Progress',
                                                    ['action' => 'edit',$id,$mycreatedtasks->id,'Work in Progress'],
                                                    ['class'=>'btn-small orange white-text'])
                                                ?>
                                            <?php endif?>
                                            <?php if($mycreatedtasks->status == 'Completed'|| 
                                                $mycreatedtasks->status =='Completed' ):?>
                                                <?= $this->Form->button('Close as Completed',
                                                ['class'=>'btn-small black white-text disabled'])
                                                ?>
                                            <?php else:?>
                                                <?= $this->Form->PostLink('Close as Completed',['action' => 'edit',
                                                    $id,$mycreatedtasks->id,'Completed'],
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