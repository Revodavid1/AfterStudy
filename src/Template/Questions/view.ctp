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

<div class="card white">
    <div class="card-content blue-grey-text">
        <?php foreach($thisquestion as $thisquestion): ?>
            <span class="card-title center"><?= $thisquestion->title ?></span>
            <hr style="border:2px solid grey"/>
            <div class="row">
                <div class="col s9">
                    <p><?= $thisquestion->question ?></p>
                    <?php foreach($thisquestion->tags as $tags):?>
                        <span class="chip blue-grey white-text"> <?="#".$tags->title?> </span>
                    <?php endforeach ?>
                </div>
                <div class="col s3">
                    <div class="card-panel white z-depth-2">
                        <p>Asked by: <?= $thisquestion->user->fullname ?></p>
                        <p>Date: <?= $thisquestion->created ?></p>
                        <?php if(!empty($thisquestion->project->short_title)){
                            echo '<p>Project: ' .$thisquestion->project->short_title. '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<div class="card white">
    <div class="card-content blue-grey-text">
        <span class="card-title">Answers</span>
        <hr style="border:1px solid grey"/>
        <?php foreach($thisquestionanswers as $thisquestionanswers): ?>
            <div class="row">
                <div class="col s9">
                    <p><?= $thisquestionanswers->answer; ?></p>
                </div>
                <div class="col s3">
                    <?php if($thisquestionanswers->correctanswer === true){
                                echo'<div class="card-panel green white-text z-depth-2">
                                <p class="card-title">Correct Answer</p>';}
                        else{
                            echo'<div class="card-panel white z-depth-2">';
                        }
                    ?>
                    
                        <p>Answered by: <?= $thisquestionanswers->user->fullname; ?></p>
                        <p>Date: <?= $thisquestionanswers->created; ?></p>
                        <?php if($thisquestion->user->id == $this->Session->read('Auth.User.id')
                                && $thisquestion->openclose != 'closed'){
                            echo $this->Form->PostLink('Mark Correct',['action' => 'markcorrect',
                                $thisquestionanswers->id,$thisquestion->id],
                                ['class'=>'btn-small green white-text']);
                        }?>
                    </div>
                </div>
            </div>
            <hr style="border:1px solid grey"/>
        <?php endforeach ?>
    </div>
</div>


<?php if($thisquestion->openclose == 'opened'):?>
    <div class="card white">
        <div class="card-content blue-grey-text">
            <span class="card-title">Your Anwser</span>
            <?= $this->Form->create($questionanswer)?>
            <hr style="border:1px solid grey"/>
            <?php 
                echo $this->Form->textarea('myanswer',array('rows' => '10','style'=>'height:auto'));
            ?>
            <div class="card-action">
                <?= $this->Form->button(('Submit'),['class' => 'green waves-effect waves-light btn-flat white-text'],
                ['type' => 'submit'])?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
<?php endif ?>