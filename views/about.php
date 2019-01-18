<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> About Us </title>
    </head>

    <body class="bg-light">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" style="width:40px;">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </nav>
           
        <center><h1 class="display-3" style="margin-top:80px">
            About Us
        </h1>
        </center>
        <br>
        
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="1" class="active"></li>
            <li data-target="#demo" data-slide-to="0"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="foto/foto1.jpg" class="img-fluid" alt="Los Angeles">
                </div>
                <div class="carousel-item active">
                    <img src="foto/foto2.jpg" class="img-fluid" alt="Chicago">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <div class="container">
            <center>
            <div class="row" style="padding:15px">
                <div class="col"> 
                    <p class="h6">Rahmat Nur Ibrahim Santosa</p>
                    <small class="text-muted">13516009</small>
                    <hr>
                    <p><small> Seorang mahasiswa yang suka mengejar mimpi, dengan cara tidur.</small></p>
                </div>
                <div class="col"> 
                    <p class="h6">Haifa Fadhila Ilma</p>
                    <small class="text-muted">13516076</small>
                    <hr>
                    <p><small> Seorang wanita independen yang tidak membutuhkan lelaki, walaupun seringkali terciduk.</small></p>                  
                </div>
                <div class="col"> 
                    <p class="h6">Rinda Nur Hafizha</p>
                    <small class="text-muted">13516151</small>                    
                    <hr>
                    <p><small>Sebagai ujung tombak dalam berbagai pemecahan permasalahan, warisan dari dosen tercintanya.</small></p>
                </div>
            </div>
            </center>
        </div>
    </body>
</html>