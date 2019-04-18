<!-- File: src/Template/Projects/myrequests.ctp -->
<?php echo $this->element('projectnavextend'); ?>

<div class="row">
   <div id="myrequests" class="col s12">
        <div class="row">
            <div class="col s0 m1 l1"></div>
            <div class="col s12 m10 l10">
                <div class="card white">
                    <div class="card-content">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Project Title</th>
                                    <th>Status</th>
                                    <th>Owned By</th>
                                    <th>Last Updated On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projectrequests as $projectrequests): ?>
                                <tr>
                                    <td>
                                        <?= $projectrequests->short_title ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->_matchingData['Bids']->status; ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->user->fullname; ?>
                                    </td>
                                    <td>
                                        <?= $projectrequests->_matchingData['Bids']->modified
                                            ->i18nFormat('MM/dd/yyyy'); ?>
                                    </td>
                                    <td>
                                        <?= $this->Form->PostLink($this->Html->tag('i','delete', 
                                            array('class'=>'material-icons')),array('controller'
                                            =>'bids','action' => 'delete', 
                                            $projectrequests->_matchingData['Bids']->id),
                                            array('class'=>'red-text','escape' => false));
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s0 m1 l1"></div>
        </div>
    </div>
</div>