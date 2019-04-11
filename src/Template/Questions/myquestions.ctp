
<?php echo $this->element('navextend'); ?>
<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row" style="margin-top:5px;margin-left: 1px;">
    <?= $this->Html->link('Ask a Question','/questions/add', 
        ['class'=>'waves-effect waves-light btn-small blue-grey']);
    ?>
    <?= $this->Html->link('Create Tag','/tags/add', 
        ['class'=>'waves-effect waves-light btn-small blue-grey']);
    ?>
</div>
<div class="col s12">
    <div class="row">
        <div class="col s0"></div>
        <div class="col s12 l2 m2">
            <div class="card-panel white z-depth-2">
                Filter Menu
            </div>
        </div>
        <div class="col s12 m9 l9">
            <div class="card white">
                <div class="card-content">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($myquestions as $myquestions): ?>
                                <tr>
                                    <td>
                                        <?= $this->Html->link($myquestions->title, 
                                        ['action' => 'view',$myquestions->id]) ?>
                                    </td>
                                    <td>
                                        <?php if ($myquestions->openclose == 'opened'){
                                            echo $myquestions->openclose; 
                                        }
                                        else{
                                            echo 'answered';
                                        }?>
                                    </td>
                                    <td>
                                        <?= $myquestions->created->i18nFormat('MM/dd/yyyy'); ?>
                                    </td>
                                    <td>
                                        <?php if ($myquestions->openclose == 'opened'){
                                            echo $this->Html->Link($this->Html->tag('i','edit', 
                                            array('class'=>'material-icons')),array('action' => 'edit', 
                                            $myquestions->id),array('escape' => false));
                                        }?>
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