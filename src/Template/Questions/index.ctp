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
<div>
    <div class="nav-wrapper z-index-5" style="border:2.5px solid grey;border-radius:10px; margin:5px;">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
        </div>
        <a class="waves-effect waves-light btn-small blue-grey" style="margin:5px;">Search</a>
      </form>
    </div>
</div>


<div class="row">
    <div class="col s3">
        <div class="card-panel white z-depth-2">
            Filter Menu
        </div>
    </div>
    <div class="col s9">
        <div class="card-panel white z-depth-2">
            <div class="card-content blue-grey-text">
                <span class="card-title">10 Most Recent Questions</span>
                <div class="large-9 medium-8 columns content">
                    <table class="vertical-table">
                        <?php foreach($recentquestions as $recentquestions):?>
                            <tr>
                                <td>
                                    <?= $this->Html->link($recentquestions->title, 
                                                        ['action' => 'view',$recentquestions->id]); ?>
                                </td>
                                <td class="right">
                                    <?= $recentquestions->user->fullname; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>