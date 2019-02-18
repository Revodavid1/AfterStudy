<div class="row"></div>
<div class="row" style="margin-right:10px">
    <div class="col s12 m4 l4">
        <div class="revcard card">
            <div class="card-image">
                <?=$this->Html->image('port.jpg',['style'=>'width:100%;max-height: 200px;']);?>
                <a class="btn-floating halfway-fab waves-effect waves-light orange">
                    <i class="material-icons">edit</i></a>
            </div>
            <div class="row">
                <div class="col s10"><h2 
                    style="font-weight:400;font-size:2.0rem;line-height: 1.33333;display: inline;">
                    <?= $this->Session->read('Auth.User.fullname');?></h2>
                </div>
                <div class="col s10"><i class="material-icons">school</i>
                    <span><h2 style="margin-bottom: 2px; margin-top: 4px;font-size:1.0rem;line-height: 
                    1.33333;font-weight:400;display: inline;"><?= $this->Session->read('Auth.User.major');?>
                    <?= $this->Session->read('Auth.User.class_standing');?> Student 
                    </h2></span>
                </div>
                <div class="col s10"><i class="material-icons">public</i>
                    <span><h2 style="margin-bottom: 2px; margin-top: 4px;font-size:1.0rem;line-height: 
                    1.33333;font-weight:400;display: inline;"><?= $this->Session->read('Auth.User.state_resident');?>
                    Resident From
                        <?= $this->Session->read('Auth.User.country_origin');?>
                    </h2></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 l4 m4"></div>
    <div class="col s12 l4 m4">
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Birthdays</span>
                <p>My Birthday: <?= $this->Session->read('Auth.User.dob')->i18nFormat('MM/dd');?></p>
                <hr style="border-top: 1px dotted green;">
                <span class="card-title">Birthdays Today</span>
                <p>(None)</p>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-left:10px;margin-right:10px">
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <div class="card-content">
                        <span class="card-title">Projects</span>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <ul class="col s12 collection">
                <li class="collection-item"><div><?=$myprojectcount?> Projects created
                    <?= $this->Html->Link(
                        $this->Html->tag('i','add', array('class'=>
                        'material-icons avatar black circle white-text tooltipped',
                        'data-position'=>'bottom',
                        'data-tooltip'=>'Add a Project')),
                        array('controller'=>'projects','action' => 'add'),array('class'=>'secondary-content',
                        'escape' => false)
                    );?>
                </div></li>
                <li class="collection-item"><div>0 Projects joined<a href="#!" class="secondary-content">
                    <i class="material-icons avatar black circle white-text tooltipped"
                    data-position="bottom" data-tooltip="View Projects to Join">remove_red_eye</i></a></div></li>
                <li class="collection-item"><div>0 Projects collaborated with<a href="#!" class="secondary-content">
                    <i class="material-icons avatar white  black-text tooltipped"
                    data-position="bottom" data-tooltip="See Requests to Collaborate">people</i></a></div></li>
                <li class="collection-item"><div>0 Projects completed<a href="#!" class="secondary-content">
                    <i class="material-icons avatar green circle white-text tooltipped"
                    data-position="bottom" data-tooltip="View Completed Projects">check</i></a></div></li>
                <li class="collection-item"><div>0 Average Rating<a href="#!" class="secondary-content">
                    <i class="material-icons avatar amber-text white tooltipped"
                    data-position="bottom" data-tooltip="See Project Ratings">star</i></a></div></li>
            </ul>
        </div>
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <div class="card-content">
                        <span class="card-title">QA</span>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <div class="card-content">
                        <span class="card-title">Events</span>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col s12 m3 l3">
        <div class="row">
            <div class="col s12">
                <div class="card-panel white">
                    <div class="card-content">
                        <span class="card-title">MarketPlace</span>
                    </div>
                </div>
            </div>
        </div> 
    </div>
        
</div>
