
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
                                <th>Question Title</th>
                                <th>Question Status</th>
                                <th>Was Accepted?</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($myanswers as $myanswers): ?>
                                <tr>
                                    <td>
                                        <?= $this->Html->link($myanswers->question->title, 
                                        ['action' => 'view',$myanswers->question->id]) ?>
                                    </td>
                                    <td>
                                        <?php if($myanswers->question->openclose == 'opened'){
                                            echo $myanswers->question->openclose; 
                                        }
                                        else{
                                            echo 'answered';
                                        }?>
                                    </td>
                                    <td>
                                        <?php if ($myanswers->correctanswer == 'true'){
                                            echo 'yes'; 
                                        }
                                        elseif($myanswers->question->openclose == 'opened'){
                                            echo 'pending';
                                        }
                                        else{
                                            echo 'no';
                                        }?>
                                    </td>
                                    <td>
                                        <?= $myanswers->created->i18nFormat('MM/dd/yyyy'); ?>
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