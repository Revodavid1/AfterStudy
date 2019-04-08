<nav>
    <div class="nav-wrapper  blue-grey lighten-1 z-index-5">
        <ul id="nav-mobile" class="right">
        <li><?= $this->Html->Link(
            'QA Home',
            array('controller'=>'questions','action' => 'index'),
            array('class'=>'whitetext','escape' => false)

        );?></li>
        <li><a href="questions">My Questions</a></li>
        <li><a href="questions">My Answers</a></li>
        <li><a href="questions">Tags</a></li>
        </ul>
    </div>
</nav>
        