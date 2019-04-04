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
    <div class = "col s12 m4 l4">
        <ul class="collapsible with-header">
            <li>
                <div class="collapsible-header">
                    <h4><i class="material-icons">keyboard_arrow_down</i>Members<span>
                        <a class="orange waves-effect waves-light btn-small modal-trigger circle" 
                        href="#addmembersmodal">Edit</a></span>
                    </h4>
                </div>
                <div class="collapsible-body active">
                    <span>
                        <table class="responsive-table">
                            <tbody>
                                <?php foreach ($thisgroupMembers as $thisgroupMember):?>
                                    <tr>
                                        <td><?=$thisgroupMember->admin['fullname']?>
                                            <span class="badge amber white-text">Owner</span>
                                        </td>
                                    </tr>
                                    <?php foreach ($thisgroupMember->users as $othermembers): ?>
                                        <tr>
                                            <td><?=$othermembers['fullname']?></td>
                                            <td><i class="material-icons avatar red-text white tooltipped"
                    data-position="bottom" data-tooltip="Remove member">delete</i></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </span>
                </div>
            </li>
        </ul>
    </div>
    <div class = "col s12 m8 l8">
    Projects
        <?php foreach ($thisgroupMembers as $thisgroupMember): ?>
            <?php foreach ($thisgroupMember->users as $thisgroupMember): ?>
                <?php echo($thisgroupMember['fullname']); ?>
            <?php endforeach ?>
        <?php endforeach ?>
    </div>
</div>