<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">Welcome to AfterStudy</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <?=$this->Html->meta('icon')?>
    <style>
        body{
            font-family: 'PT Serif', serif;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrapper" style="background-color:black; color:white;">
            <div class="brand-logo center">
                <?=$this->Html->image('afterstudy.png', array('height'=>'70px'));?>
            </div>
            <ul class="left">
                <li><h5>AfterStudy</h5></li>
            </ul>
            <ul id="nav-mobile" class="right">
                <?= $this->Html->Link('Register', ['action' => 'register']) ?>
            </ul>
            <ul id="nav-mobile" class="right">
                <?= $this->Html->Link('Login', ['action' => 'login']) ?>       
            </ul>
        </div>      
    </nav>

    <script>
        $(document).ready(function(){
            $('.slider').slider();
            $('.datepicker').datepicker();
        });
    </script>

    <div class="row" style="margin-top:10px">
        <div class="col s6">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <?=$this->Html->image('projectshare.jpg', ['alt' => 'Projects']);?>
                        <div class="caption center-align">
                            <h3 class="deep-orange-text">Projects</h3>
                            <h5 class="light white-text text-darken-3">Collaborate on Projects with others</h5>
                        </div>
                    </li>
                    <li>
                        <?=$this->Html->image('events.jpg', ['alt' => 'Events']);?>
                        <div class="caption left-align">
                            <h3>Events</h3>
                            <h5 class="light grey-text text-lighten-3">Share Events and Socialize</h5>
                        </div>
                    </li>
                    <li>
                        <?=$this->Html->image('qa.jpg', ['alt' => 'QA']);?>
                        <div class="caption right-align">
                            <h3>QA Forum</h3>
                            <h5 class="light grey-text text-lighten-3">Discuss Questions and Review Answers</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div> 

        <div class="col s6">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
          


<footer class="page-footer" style="width: 100%;left:0;bottom:0;
    background-color:black;color:white;">
    <div class="footer-copyright">
        <div class="container">
            © 2019 AfterStudy
        </div>
    </div>
</footer>
            
</body>
</html>