<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">AfterStudy::User</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?=$this->Html->meta('icon')?>
    <style>
        body{
            font-family: 'PT Serif', serif;
        }
        header, main {
            padding-left: 200px;
        }

        @media only screen and (max-width : 992px) {
            header, main {
                padding-left: 0;
            }
        }
        .revcard {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .revtitle {
            color: grey;
            font-size: 18px;
        }
        button:hover, a:hover {
            opacity: 0.7;
        }
        #skillInput {
            border-box: box-sizing;
            background-repeat: no-repeat;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }
        #mygroups { display: none; }
        
    </style>
</head>
<body style="color:#263238 ">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper blue-grey darken-2" style="color:white;">
                <a href="#" data-target="sidenavout" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                    <li><h5>AfterStudy</h5></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li class="white-text"><?= $this->Session->read('Auth.User.fullname');?>
                    </li>
                    <li>
                        <?= $this->Html->Link(
                            $this->Html->tag('i','dashboard', array('class'=>'material-icons')),
                            array('controller'=>'users','action' => 'dashboard'),array('escape' => false)
                        );?>
                    </li>
                    <li class="white-text" escape="false"><a href="#">
                        </span><i class="material-icons">face</i></a><span>
                    </li>
                    <li><a href="#"><i class="material-icons">notifications</i></a></li>
                    <li><a href="#"><i class="material-icons">settings</i></a></li>
                    <li>
                        <?= $this->Html->Link(
                            $this->Html->tag('i','exit_to_app', array('class'=>'material-icons')),
                            array('controller'=>'users','action' => 'logout'),array('escape' => false)
                        );?>
                    </li>
                </ul>
            </div>      
        </nav>
    </div>
    <ul id="slide-out" class="sidenav sidenav-fixed collection" 
        style="width:200px;margin-top: 60px;">
        <li><div class="brand-logo center">
                <?=$this->Html->image('afterstudy.png');?>
            </div></li>
        <li class="collection-item">
            <div><i class="material-icons">work</i>
                <?= $this->Html->Link(
                        'Projects',
                        array('controller'=>'projects','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
        <li class="collection-item">
            <div><i class="material-icons">group</i>
                <?= $this->Html->Link(
                        'Groups',
                        array('controller'=>'groups','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
        <li class="collection-item">
            <div><i class="material-icons">live_help</i>
                <?= $this->Html->Link(
                        'QA Forum',
                        array('controller'=>'questions','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
    </ul>
    <ul id="sidenavout" class="sidenav collection hide-on-med-and-up" 
        style="width:200px;margin-top: 60px;">
        <li><div class="brand-logo center">
                <?=$this->Html->image('afterstudy.png');?>
            </div></li>
        <li class="collection-item">
            <div><i class="material-icons">work</i>
                <?= $this->Html->Link(
                        'Projects',
                        array('controller'=>'projects','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
        <li class="collection-item">
            <div><i class="material-icons">group</i>
                <?= $this->Html->Link(
                        'Groups',
                        array('controller'=>'groups','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
        <li class="collection-item">
            <div><i class="material-icons">live_help</i>
                <?= $this->Html->Link(
                        'QA Forum',
                        array('controller'=>'groups','action' => 'index'),
                        array('class'=>'blue-grey-text','escape' => false)

                    );?>
            </div>
        </li>
    </ul>


    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.modal').modal({dismissible:false});
            //$('.modal').modal();
            $('#projectmodal').modal('open');
            $('#addskillsmodal').modal();
            $('.tabs').tabs();
            $('.datepicker').datepicker({format:'yyyy-mm-dd'});
            $('.tooltipped').tooltip();
            $('select').formSelect();
            $('.collapsible').collapsible();
        });

        function filterSkills() {
            var input, filter, select, option, a, i, txtValue;
            input = document.getElementById('skillInput');
            filter = input.value.toUpperCase();
            select = document.getElementById("skillsid");
            option = select.getElementsByTagName('option');
            for (i = 0; i < option.length; i++) {
                txtValue = option[i].textContent || option[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }
        function filterUsers() {
            var input, filter, select, option, a, i, txtValue;
            input = document.getElementById('userInput');
            filter = input.value.toUpperCase();
            select = document.getElementById("usersid");
            option = select.getElementsByTagName('option');
            for (i = 0; i < option.length; i++) {
                txtValue = option[i].textContent || option[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }
        function showSelect(privacy,mygroups){
            document.getElementById(privacy).style.display = mygroups.value == "Group" ? 'block' : 'none';
        }
        
    </script>
    
    <main>
        <div>
            <div class="col s12" style="margin-left:3px">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </main>    
</body>
</html>