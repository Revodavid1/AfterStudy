<!-- File: src/Template/Tasks/mytasks.ctp -->
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card white">
                    <div class="card-content">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Project</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mytasks as $mytasks): ?>
                                    <tr>
                                        <td>
                                            <?= $mytasks->title; ?>
                                        </td>
                                        <td>
                                            <?= $mytasks->status; ?>
                                        </td>
                                        <td>
                                            <?= $mytasks->project->short_title; ?>
                                        </td>
                                        <td>
                                            <?= $mytasks->modified->i18nFormat('MM/dd/yyyy'); ?>
                                        </td>
                                        <td>
                                           <?= $this->Html->Link('Go to Project Task',array('controller' =>
                                                'tasks','action' => 'index',$mytasks->project->id),
                                                array('escape' => false));?>
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