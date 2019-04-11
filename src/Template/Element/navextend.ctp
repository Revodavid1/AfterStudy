<nav>
    <div class="nav-wrapper  blue-grey lighten-1 z-index-5">
        <ul id="nav-mobile" class="right">
        <li>
            <?= $this->Html->Link('QA Home',
                array('controller'=>'questions','action' => 'index'),
                array('class'=>'whitetext','escape' => false));
            ?>
        </li>
        <li>
            <?= $this->Html->Link('My Questions',
                array('controller'=>'questions','action' => 'myquestions'),
                array('class'=>'whitetext','escape' => false));
            ?>
        </li>
        <li>
            <?= $this->Html->Link('My Answers',
                array('controller'=>'questions','action' => 'myanswers'),
                array('class'=>'whitetext','escape' => false));
            ?>
        </li>
        <li>
            <?= $this->Html->Link('Tags',
                array('controller'=>'tags','action' => 'index'),
                array('class'=>'whitetext','escape' => false));
            ?>
        </li>
        </ul>
    </div>
</nav>
        