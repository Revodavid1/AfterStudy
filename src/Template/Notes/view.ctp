<div class="center">
    <?= $this->Flash->render() ?>
</div>

<div class="row">
    <div class="col s3">
        <div class="collection">
            <?php foreach($allnotes as $note):?>
                <?php $currentnote = $note->note;?>
                <a href="#" class="collection-item" 
                    onClick="noteTxt('<?php echo htmlspecialchars($currentnote,ENT_COMPAT); ?>')">
                    <?= $note->user->fullname;?> (<?= $note->created;?>)
                </a>
            <?php endforeach?>
        </div>
    </div>
    <div class="col s8">
      <div class="card white lighten-5">
        <div class="card-content black-text">
            <span class="card-title">Work Notes</span>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <p id="displaynote">Click on a note by the left</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>