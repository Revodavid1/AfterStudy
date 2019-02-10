<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">OffCampus::User</title>
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
    </style>
</head>
<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper" style="background-color:black; color:white;z-index: 1000; ">
                <ul class="left">
                    <li><h5>OffCampus</h5></li>
                </ul>
                <ul class="right hide-on-med-and-down">
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
                            array('action' => 'logout'),array('escape' => false)
                        );?>
                    </li>
                </ul>
            </div>      
        </nav>
    </div>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    <div>
        <ul id="slide-out" class="sidenav sidenav-fixed collection" style="width:200px;margin-top: 60px;">
            <li><div class="brand-logo center">
                <?=$this->Html->image('afterstudy.png');?>
            </div></li>
            <li class="collection-item">
                <div><i class="material-icons">work</i>
                    <?= $this->Html->Link(
                            'Projects',
                            array('controller'=>'projects','action' => 'index'),
                            array('class'=>'black-text','escape' => false)

                        );?>
                </div>
            </li>
            <li class="collection-item"><div><a href="#!" class="black-text">
                <i class="material-icons">date_range</i> Events</a></div></li>
            <li class="collection-item"><div><a href="#!" class="black-text">
                <i class="material-icons">live_help</i> QA Forum</a></div></li>
            <li class="collection-item"><div><a href="#!" class="black-text">
                <i class="material-icons">local_grocery_store</i> MarketPlace</a></div></li>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <main>
        <div>
            <div class="col s12">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </main>    
</body>
</html>