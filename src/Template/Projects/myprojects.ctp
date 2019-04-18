<!-- File: src/Template/Projects/myprojects.ctp -->
<?php echo $this->element('projectnavextend'); ?>
<div class="row">
    <div id="myprojects" class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 l2 m2">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <span class="card-title">
                            <?= $this->Html->link('Create New','/projects/add', 
                            ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small z-depth-5']
                            );?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col s12 m9 l9">
                <div class="card white">
                    <div class="card-content">
                        <table class="">
                            <thead>
                                <tr>
                                    <th>Short Title</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($myprojects as $myprojects): ?>
                                    <tr>
                                        <td>
                                            <?= $this->Html->link($myprojects->short_title, 
                                            ['action' => 'projectmode',$myprojects->id_alias]) ?>
                                            <?php if ($myprojects->user_id != $this->Session->read('Auth.User.id')):
                                            ?>
                                                <div class="blue-grey darken-4 white-text chip z-depth-2"
                                                    style="font-size:8pt">
                                                    Shared with me
                                                </div>
                                            <?php endif?>
                                        </td>
                                        <td>
                                            <?= $myprojects->status; ?>
                                        </td>
                                        <td>
                                            <?= $myprojects->created->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->Link($this->Html->tag('i','edit', 
                                                array('class'=>'material-icons')),array('action' => 'edit', 
                                                $myprojects->slug),array('escape' => false));?>
                                            <?= $this->Html->Link($this->Html->tag('i','people', 
                                                array('class'=>'material-icons black-text')),
                                                array('action' => 'members',$myprojects->id_alias),
                                                array('escape' => false));
                                            ?>
                                            <?= $this->Html->Link($this->Html->tag('i','view_list', 
                                                array('class'=>'material-icons black-text')),
                                                array('action' => 'members',$myprojects->id_alias),
                                                array('escape' => false));
                                            ?>
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