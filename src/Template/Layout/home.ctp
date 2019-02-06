<!DOCTYPE html>
<html lang="en">
<head>
    <title class="">Welcome to AfterStudy</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="shortcut icon" href="webroot\img\favicon.ico" type="image/x-icon">
    <link rel="icon" href="webroot\img\favicon.ico" type="image/x-icon">  
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <style>
        body{
            font-family: 'PT Serif', serif;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-wrapper" style="background-color:black; color:white;">
            <ul class="left hide-on-med-and-down">
                <li><h5>AfterStudy</h5></li>
            </ul>
            <img class="brand-logo center" height="120%" src="webroot\img\afterstudy.png"/>
        </div>      
    </nav>
<?php echo $this->fetch('content'); ?>

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