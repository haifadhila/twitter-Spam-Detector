<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> TwitterSPAM Find Result </title>
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

        <div class="container" style="margin-top:100px;">
            <center>
                <h2 class="display-4">SPAM Find Result</h2>
            </center>
            <div class="row">

                <?php
                    $string = file_get_contents("../controllers/twitterfeeds.json");
                    $json_a = json_decode($string, true);

                    echo '<div class="col">';
                    $x = 0;
                    foreach ($json_a as $tweeter_name => $tweet) {
                        if ($x % 7 == 0 && $x != 0) {
                            echo '</div>
                                <div class="col">';
                        }
                        echo "<hr>";
                        if ($tweet['spam']){
                            $content = explode(" ",$tweet['text']);

                            echo "<p class= \"lead\"><strong> SPAM </strong></p>";
                            echo "
                                <div class=\"card border-danger\">
                                    <div class=\"card-header bg-danger\">
                                        <img  class=\"rounded-circle float-left border-white\" src=\"". $tweet['profile_image_url'] ."\">
                                        <h6 class=\"text-white\" style=\"padding-top:15px; padding-left:60px;\">@". $tweet['username'] ."</h6>
                                    </div>
                                    <div class=\"card-body\">";
                                        for ($i=0; $i < sizeof($content); $i++) {
                                            if (strpos(strtolower($content[$i]), $tweet['spam_keyword']) !== false) {
                                                echo "<p class=\"bg-warning border-danger\" style=\"display:inline\">
                                                ".$content[$i]."</p>";
                                            } else {
                                                echo "<p class=\"card-text\" style=\"display:inline\">
                                                ".$content[$i]." </p>";
                                            }
                                        }
                                        echo "</p>
                                        <p class=\"card-text\"><small class=\"text-muted\">". $tweet['created_at'] ."</small></p>
                                    </div>
                                </div>
                            ";
                            $x++;
                        } else {
                            echo "
                                <div class=\"card\">
                                    <div class=\"card-header\">
                                        <img  class=\"rounded-circle float-left\" src=\"". $tweet['profile_image_url'] ."\">
                                        <h6 style=\"padding-top:15px; padding-left:60px;\">@". $tweet['username'] ."</h6>
                                    </div>
                                    <div class=\"card-body\">
                                        <p class=\"card-text\">". $tweet['text'] ."</p>
                                        <p class=\"card-text\"><small class=\"text-muted\">". $tweet['created_at'] ."</small></p>
                                    </div>
                                </div>
                            ";
                            $x++;
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
        <br> <br>

    </body>
</html>
