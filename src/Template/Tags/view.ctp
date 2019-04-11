<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
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
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h5><?= __('Related Questions') ?></h5>
        <?php if (!empty($tag->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
            </tr>
            <?php foreach ($tag->questions as $questions): ?>
            <tr>
                <td><?= $this->Html->link($questions->title, 
                                        ['controller'=>'questions','action' => 'view',$questions->id]) ?></td>
                <td>
                    <?php if ($questions->openclose == 'opened'){
                        echo $questions->openclose; 
                    }
                    else{
                        echo 'answered';
                    }?>
                </td>
                <td><?= h($questions->created) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
