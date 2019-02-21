<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">Welcome to OffCampus</title>
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
    </style>
</head>
<body class="blue-grey-text">
    <nav>
        <div class="nav-wrapper blue-grey darken-2" style="color:white;">
            <div class="brand-logo center">
                <?=$this->Html->image('afterstudy.png', array('height'=>'70px'));?>
            </div>
            <ul class="left">
                <li><h5>OffCampus</h5></li>
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
            $('.datepicker').datepicker({format:'yyyy-mm-dd'});
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
            © 2019 OffCampus
        </div>
    </div>
</footer>
            
</body>
</html>