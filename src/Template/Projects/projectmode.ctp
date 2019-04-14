<div class="row"></div>
<div class="row" style="margin-left:0.5px;margin-right:0.5px;">
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
                <span class="card-title">Task Groups</span>
                <p>Task Groups are used to classify similar tasks.</p>
            </div>
            <div class="card-action">
                <?= $this->Html->link('Create', 
                    ['controller'=>'Taskgroups','action' => 'add',$id]) 
                ?>
                <?= $this->Html->link('View Task Groups', 
                    ['controller'=>'Taskgroups','action' => 'index',$id]) 
                ?>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
            <span class="card-title">Tasks</span>
            <p>Create or view stand-alone tasks or tasks belonging to a Task Group.</p>
            </div>
            <div class="card-action">
                <?= $this->Html->link('Create', 
                    ['controller'=>'Tasks','action' => 'add',$id]) 
                ?>
                <?= $this->Html->link('All Tasks', 
                    ['controller'=>'Tasks','action' => 'all',$id]) 
                ?>
                <?= $this->Html->link('Assigned to Me', 
                    ['controller'=>'Tasks','action' => 'index',$id]) 
                ?>
                <?= $this->Html->link('Created by Me', 
                    ['controller'=>'Tasks','action' => 'createdlist',$id]) 
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-left:0.5px;margin-right:0.5px;">
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
            <span class="card-title">Work Notes</span>
            <p>Create or view worknotes.</p>
            </div>
            <div class="card-action">
                <?= $this->Html->link('Create Note', 
                    ['controller'=>'Notes','action' => 'add',$id]) 
                ?>
                <?= $this->Html->link('All Notes', 
                    ['controller'=>'Notes','action' => 'view',$id]) 
                ?>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
            <span class="card-title">Related Questions</span>
            <p>Questions asked on QA Forum related to this project .</p>
            </div>
            <div class="card-action">
                <?= $this->Html->link('View Questions', 
                    ['action' => 'questions',$id]) 
                ?>
                <?= $this->Html->link('Ask A Question', 
                    ['controller'=>'questions','action' => 'add']) 
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 l6 m6">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                        <div class="card-title">Recent Pending Tasks</div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <ul class="col s12 collection">
                <p>Coming Soon</p>
            </ul>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4 white-text">
                    <div class="card-content">
                        <span class="card-title">Recently Completed Tasks</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="col s12 collection">
                <p>Coming Soon</p>
            </ul>
        </div> 
    </div>
</div>