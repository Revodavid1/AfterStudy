<div class="center">
    <?= $this->Flash->render() ?>
</div>
<div class="row" >
    <table class="responsive-table">
        <tbody>
            <?= $this->Form->create($thisgroup)?>
            <tr>
                <td class="col s12 m10 l10">
                    <div class="input-field">
                        <?= $this->Form->control(('title'),array('maxlength'=>'255'),
                        ['type' => 'text']);?>
                    </div>
                </td>
                <td class="col s12 m2 l2">
                    <div class="input-field">
                        <?= $this->Form->button(('Update Title'),['class' => 'green waves-effect waves-light 
                        btn-flat white-text'],['type' => 'submit'])?>
                    </div>
                </td>
            </tr>
            <?= $this->Form->end() ?>
        </tbody>
    </table>
</div>

<div class = "row">
    <div class = "col s12 m3 l3">
    Members
    </div>
    <div class = "col s12 m8 l8">
    Projects
    </div>
</div>