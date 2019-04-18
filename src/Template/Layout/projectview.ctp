<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">EasyTasks::Projects</title>
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
        
    </style>
</head>
<body class="blue-grey">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white" style="color:black;">
                <a href="#" data-target="sidenavout" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                    <li><h5>EasyTasks - Project Mode
                        <span class="right"><?= $this->Html->Link(
                        '[Exit Project Mode]',
                        array('controller'=>'users','action' => 'dashboard'),
                        array('class'=>'blue-grey-text','escape' => false));?></span></h5>
                    </li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li class="blue-grey-text">
                        <?= $this->Session->read('Auth.User.fullname');?>
                    </li>
                    <li>
                        <?= $this->Html->Link(
                            $this->Html->tag('i','dashboard', array('class'=>'material-icons blue-grey-text')),
                            array('controller'=>'projects','action' => 'projectmode',$id),array('escape' => false)
                        );?>
                    </li>
                    <li><a href="#"><i class="material-icons blue-grey-text">notifications</i></a></li>
                    <li>
                        <?= $this->Html->Link(
                            $this->Html->tag('i','exit_to_app', array('class'=>'material-icons blue-grey-text')),
                            array('controller'=>'users','action' => 'logout'),array('escape' => false)
                        );?>
                    </li>
                </ul>
            </div>      
        </nav>
    </div>
    
    <ul id="sidenavout" class="sidenav collection hide-on-med-and-up" 
        style="width:200px;margin-top: 60px;">
        <li class="collection-item">
            <div>
                <?= $this->Html->Link(
                    'Exit Project Mode',
                    array('controller'=>'users','action' => 'dashboard'),
                    array('class'=>'blue-grey-text','escape' => false));
                ?>
            </div>
        </li>
    </ul>


    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.modal').modal();
            $('#tasksmodal').modal({dismissible:false});
            $('#taskgroupmodal').modal({dismissible:false});
            $('#projectmodal').modal('open');
            $('#tasksmodal').modal('open');
            $('#taskgroupmodal').modal('open');
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
        function noteTxt(thisnote) {
            document.getElementById("displaynote").innerHTML = thisnote;
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