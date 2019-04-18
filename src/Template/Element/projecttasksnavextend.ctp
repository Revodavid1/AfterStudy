<nav>
    <div class="nav-wrapper blue-grey lighten-5 z-index-5 black-text">
        <ul id="nav-mobile" class="right">
            <li>
                <?= $this->Html->Link('All Tasks',
                    array('controller'=>'tasks','action' => 'all',$id),
                    array('class'=>'black-text','escape' => false));
                ?>
            </li>
            <li>
                <?= $this->Html->Link('My Tasks',
                    array('controller'=>'tasks','action' => 'index',$id),
                    array('class'=>'black-text','escape' => false));
                ?>
            </li>
            <li>
                <?= $this->Html->Link('Created Tasks',
                    array('controller'=>'tasks','action' => 'createdlist',$id),
                    array('class'=>'black-text','escape' => false));
                ?>
            </li>
        </ul>
    </div>
</nav>
        