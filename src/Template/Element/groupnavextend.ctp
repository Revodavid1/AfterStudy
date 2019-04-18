<nav>
    <div class="nav-wrapper  blue-grey lighten-1 z-index-5">
        <ul id="nav-mobile" class="right">
            <li>
                <?= $this->Html->Link('Group Home',
                    array('controller'=>'groups','action' => 'index'),
                    array('class'=>'white-text','escape' => false));
                ?>
            </li>
            <li>
                <?= $this->Html->Link('Create Group Project',
                    array('controller'=>'groups','action' => 'addproject',$groupid,$owner),
                    array('class'=>'white-text','escape' => false));
                ?>
            </li>
        </ul>
    </div>
</nav>
        