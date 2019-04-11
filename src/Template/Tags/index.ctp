<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
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

<div class="tags index large-9 medium-8 columns content">
    <h3><?= __('Tags') ?></h3>
    <div class="col s12">
    <div class="row">
        <div class="col s12 s3 m3">
            <div class="card-panel white z-depth-2">
                Filter Menu
            </div>
        </div>
        <div class="col s12 l8 m8"> 
            <ul class="collection">
                <li class="collection-item"><div><a href="#"> <?= $this->Paginator->sort('title')?> (sort)
                </a></div>
                </li>
                <?php foreach ($tags as $tag): ?>
                <?php $count = count($tag->questions);?>
                <li class="collection-item"><div>
                    <a href="tags/view/<?= $tag->id?>"> <?= "#".$tag->title?> </a>
                    <span class="secondary-content"><?= $count ?></span></div></li>
                <?php endforeach; ?>
            </ul>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
        <div class="col s1"></div>
    </div>
</div>