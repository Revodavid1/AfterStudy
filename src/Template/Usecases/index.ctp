<!-- File: src/Template/Usecases/index.ctp -->
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s0"></div>
            <div class="col s12 l2 m2">
                <div class="card white z-depth-2">
                    <div class="card-content">
                        <span class="card-title">
                            <?= $this->Html->link('Create Use Case',
                            ['controller'=>'Usecases','action' => 'add',$id], 
                            ['class'=>'blue-grey darken-4 waves-effect waves-light btn-small z-depth-5']
                            );?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col s12 m9 l9">
                <div class="card white">
                    <div class="card-content">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects_usecases as $projects_usecases): ?>
                                    <tr>
                                        <td>
                                            <?= $this->Html->link($projects_usecases->title, 
                                            ['action' => 'projectmode',$projects_usecases->id]) ?>
                                        </td>
                                        <td>
                                            <?= $projects_usecases->created->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->Link($this->Html->tag('i','edit', 
                                                array('class'=>'material-icons')),array('action' => 'edit', 
                                                $projects_usecases->id),array('escape' => false));?>
                                            <i class="material-icons red-text">delete</i>
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
</div>