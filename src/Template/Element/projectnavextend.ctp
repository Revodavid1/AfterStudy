<nav>
    <div class="nav-wrapper  blue-grey lighten-1 z-index-5">
        <ul id="nav-mobile" class="right">
            <li>
                <?= $this->Html->Link('Timeline',
                    array('controller'=>'projects','action' => 'index'),
                    array('class'=>'white-text','escape' => false));
                ?>
            </li>
            <li>
                <?= $this->Html->Link('My Projects',
                    array('controller'=>'projects','action' => 'myprojects'),
                    array('class'=>'white-text','escape' => false));
                ?>
            </li>
            <li>
                <?= $this->Html->Link('My Requests',
                    array('controller'=>'projects','action' => 'mybids'),
                    array('class'=>'white-text','escape' => false));
                ?>
            </li>
        </ul>
    </div>
</nav>
        