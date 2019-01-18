<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Twitter SPAM Detector </title>
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
        <div class="container bg-light" style="width: 1000px; margin-top:100px">
            <center><img src="twitH.jpg" class="img-fluid rounded-circle" alt="Twitter">
            <br> <br>
            <h1 class="display-4">Twitter SPAM Detector</h1>
            <p class="text-monospace"> created by: Kelompok DuaDua</p>
            <br>
            </center>
            <div class="container-fluid border shadow p-4 mb-4 bg-white" style="width: 500px;">

                </center>
                <br>

                <form method="POST">
                    <div class="form-group">
                        <label for="user">Username:</label>
                        <input type="text" class="form-control" id="user" placeholder="Enter username" required name="user">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Metode Pencarian:</label>
                        <select class="form-control" id="sel1" squired name="alg">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Booyer Moore</option>
                        <option value="2">KMP</option>
                        <option value="3">Regex</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="key">Keyword:</label>
                        <input type="text" class="form-control" id="keyword" placeholder="Enter keyword" required name="key">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php
                        if (isset($_POST['user']) && isset($_POST['alg']) && isset($_POST['key'])){
                            $myfile = fopen("../controllers/input.txt", "w+") or die("Unable to open file!");
                            $username = $_POST['user']."\n";
                            $alg = $_POST['alg']."\n";
                            $key = $_POST['key'];
                            fwrite($myfile, $username);
                            fwrite($myfile, $alg);
                            fwrite($myfile, $key);
                            fclose($myfile);
                            exec("python ../controllers/ori.py");
                            echo("<script>location.href = 'form.php?msg=$msg';</script>");
                        }
                    ?>
                </form>

            </div>
        <br>
        </div>
    </body>
</html>
