<div class="row" style="margin-top:5px;margin-left: 1px;">
    <?= $this->Html->link('Ask a Question','/questions/add', 
        ['class'=>'waves-effect waves-light btn-small white blue-grey-text']);
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projectquestions as $projectquestions): ?>
                                <tr>
                                    <td>
                                        <?= $this->Html->link($projectquestions->title, 
                                        ['controller'=>'questions','action' => 'view',$projectquestions->id]) ?>
                                    </td>
                                    <td>
                                        <?php if ($projectquestions->projectquestions == 'opened'){
                                            echo $projectquestions->projectquestions; 
                                        }
                                        else{
                                            echo 'answered';
                                        }?>
                                    </td>
                                    <td>
                                        <?= $projectquestions->created->i18nFormat('MM/dd/yyyy'); ?>
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