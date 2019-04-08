<?php echo $this->element('navextend'); ?>
<div class="center">
    <?= $this->Flash->render() ?>
</div>

<div class="row">
    <div class="col s12 m12">
      <div class="card white lighten-5">
        <div class="card-content black-text">
            <span class="card-title">Question Form</span>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 l6 m6">
                            <i class="material-icons prefix">title</i>
                            <input id="title" type="text" class="validate" data-length="100" maxlength="100">
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <textarea id="desctextarea" class="materialize-textarea"></textarea>
                            <label for="desctextarea">Description</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-action">
          <a href="#">Submit</a>
        </div>
      </div>
    </div>
</div>