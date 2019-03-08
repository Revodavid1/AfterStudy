<div class="row">
    <div class="col s12 l3 m3"> 
        <?php foreach ($this_taskgroup as $this_taskgroup): ?>
            <div class="card white">
                <div class="card-content blue-grey-text">
                    <span class="card-title"><?= $this_taskgroup->title;?></span>
                    <p><?= $this_taskgroup->description;?></p>
                    <div class="card-action">
                        <p> Created on:<?= $this_taskgroup->created->i18nFormat('MM/dd/yyyy');?></p>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="col s12 l9 m9"> 
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Tasks for <?= $this_taskgroup->title;?></span>
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Assigned to</th>
                            <th>Created by</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>