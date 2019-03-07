<div class="row"></div>
<div class="row" style="margin-left:0.5px;margin-right:0.5px;">
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
                <span class="card-title">Use Cases</span>
                <p>Define Use Cases here. Create a use case before creating tasks.</p>
            </div>
            <div class="card-action">
                <?= $this->Html->link('Create', 
                    ['controller'=>'Usecases','action' => 'add',$id]) 
                ?>
                <?= $this->Html->link('View Use Cases', 
                    ['controller'=>'Usecases','action' => 'index',$id]) 
                ?>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="card white">
            <div class="card-content blue-grey-text">
            <span class="card-title">Tasks</span>
            <p>Create Tasks associated with a use case and assign task to a user.</p>
            </div>
            <div class="card-action">
            <a href="#">Create</a>
            <a href="#">All Tasks</a>
            <a href="#">My Tasks</a>
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
    </div>
</div>