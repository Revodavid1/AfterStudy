<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<?php echo $this->element('navextend'); ?>
<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Add Tag') ?></legend>
        <?php
            echo $this->Form->control('title',array('class'=>'validate','data-length'=>'191','id'=>'title'));
        ?>
        <div>
            <?= $this->Form->button(__('Submit'),['class' => 'green waves-effect waves-light btn-flat white-text'],
            ['type' => 'submit'])?>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
